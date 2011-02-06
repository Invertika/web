<?php
/*
 *  The Mana Server Account Manager
 *  Copyright 2009 The Mana Project Development Team
 *
 *  This file is part of The Mana Server.
 *
 *  The Mana Server  is free software; you can redistribute  it and/or modify it
 *  under the terms of the GNU General  Public License as published by the Free
 *  Software Foundation; either version 2 of the License, or any later version.
 *
 *  The Mana Server is  distributed in  the hope  that it  will be  useful, but
 *  WITHOUT ANY WARRANTY; without even  the implied warranty of MERCHANTABILITY
 *  or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 *  more details.
 *
 *  You should  have received a  copy of the  GNU General Public  License along
 *  with The Mana Server; if not, write to the  Free Software Foundation, Inc.,
 *  59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 */


/**
 * Controller for displaying server statistics.
 * 
 * @ingroup controllers
 */ 
class Statistics extends Controller {

    /**
     * Initializes the Home controller.
     */
    function __construct()
    {
        parent::Controller();
        $this->output->enable_profiler(
            $this->config->item('mana_enable_profiler')
        );
        
        // this is for testing only
        $this->load->library('jpgraphwrapper');
    }
    
    /** 
     * Default controller function. 
     */
    public function index()
    {
        $this->load->model('server_statistics');
        $this->CreateChart();
        
        
        $this->output->showPage( 'Server Statistics', 'manaweb/server_statistics',
            array('stats' => $this->server_statistics->getGlobalStats()));
    }
    
    
    /** 
     * @todo THIS FUNCTION IS IMPLEMENTED AS TECHNICAL DEMO USING JPGRAPH. IT HEAVYLY
     * NEED REFACTORING !!!
     * JUST COMMITED BECAUSE ITS WEEKEND AND WE WORK ON A BRANCH YET ;-)
     */ 
    private function CreateChart()
    {
        $g = $this->jpgraphwrapper->PieChart(400, 200, "testchar2.png", 1);
        $g->setFrame(true, '#E1D6CF', 0);
        $g->SetColor('#E1D6CF');
        $g->SetAntiAliasing(); 
        
        
        $g->legend->Hide(false); 
        
        // Title setup
        $g->title->Set("Ratio male chars to female");
        $g->title->SetFont(FF_FONT1,FS_BOLD);

        // TODO: exchange hardcoded table name with constant
        $res = $this->db->query( 
            "SELECT GENDER AS GENDER, COUNT(*) AS AMNT " .
            "  FROM mana_characters " .
            " GROUP BY GENDER " .
            " ORDER BY GENDER " );
        
        // initialize data array if no characters exist yet
        if ($res->num_rows() == 0)
        {
            $data = array(0 => 1, 1 => 1);
        }
        else
        {
            $data = array();
            foreach ($res->result() as $gender)
            {
                $data[$gender->GENDER] = $gender->AMNT;
            }
        }
            
        $p1 = new PiePlot3D($data);
        
        $p1->SetEdge(); 
        $p1->SetSliceColors(array('#DBBBA4','#BA7A58')); 
        
        // Setup slice labels and move them into the plot
        $p1->value->SetFont(FF_FONT1,FS_BOLD);
        $p1->value->SetColor("black");
        $p1->SetLabelPos(0.3);
        $p1->SetLegends(array('male', 'female'));
        
        $g->Add($p1);
        
        $g->Stroke(); 
    }
    
    
} // class Statistics
?>