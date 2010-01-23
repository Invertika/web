<?php
/*
 *  The Mana Server Account Manager
 *  Copyright 2008 The Mana Server Development Team
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
 */


/**
 * Controller for running and displaying unit tests.
 * 
 * @ingroup controllers
 */ 
class Test extends Controller {

    /**
     * Initializes the Test controller.
     */
    function __construct()
    {
        parent::Controller();
        $this->load->library('unit_test');
        $this->unit->use_strict(TRUE);
    }
    
    /** 
     * Default controller function. Shows the news of the homepage.
     */
    function index()
    {
        $this->test_character_model();
        $this->test_guild_model();
        $this->test_membershipprovider();
        echo $this->unit->report();
    }
    
    
    /**
     * This function runs tests on character model library.
     */
    private function test_character_model()
    {
        require_once(APPPATH.'models/character'.EXT);
        
        $this->unit->run( Character::experienceForLevel(  5 ),  1250 );
        $this->unit->run( Character::experienceForLevel( 10 ), 10000 );
        $this->unit->run( Character::experienceForLevel( 15 ), 33750 );
    } 
    
    
    
    /**
     * This function runs tests on guild model library.
     */
    private function test_guild_model()
    {
        require(APPPATH.'models/guild'.EXT);
        
        $guild = Guild::getGuild(1);
        $this->unit->run( $guild->getId(), 1, 'test guild id function' );
        $this->unit->run( $guild->getName(), 'Masters of the universe', 
            'test guild name function' );
        $guild = Guild::getGuild(99);
        $this->unit->run( $guild, 'is_false', 'test guild doesn\'t exist' );
    }
    
    
    /**
     * This function runs tests on membershipprovider library.
     */
    private function test_membershipprovider()
    {
        $mp = $this->membershipprovider;
        
        $this->unit->run( $mp->getRandomHashKey(), 'is_string',
            'test datatype of getRandomHashKey() function' );
        $this->unit->run( strlen($mp->getRandomHashKey()),  24,
            'test default length of hash generated by getRandomHashKey() func' );
        $this->unit->run( strlen($mp->getRandomHashKey(30)),  30,
            'test custom length of hash generated by getRandomHashKey() func' );
            
            
        $this->unit->run( $mp->validatePassword("test", "testuser"),  
            Membershipprovider::PASSWORD_TO_SHORT,
            'test passwordpolicy: to short' );            
        $this->unit->run( $mp->validatePassword("abcdefghijklmnopqrstuvwxyzAB".
            "CDEFGHIJKLMNOPQRSTUVWXYZ", "test"),  
            Membershipprovider::PASSWORD_TO_LONG,
            'test passwordpolicy: to long' );            
        $this->unit->run( $mp->validatePassword("testuser", "testuser"),  
            Membershipprovider::PASSWORD_SIMILAR_TO_USERNAME,
            'test passwordpolicy: similar username' );            
        $this->unit->run( $mp->validatePassword("testpassword", "testuser"),  
            Membershipprovider::PASSWORD_OK,
            'test passwordpolicy: ok' );            
    }
    
    
} // class Test
?>