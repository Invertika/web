<h3>Welcome <?= $user->getUsername() ?>!</h3>

<p>From this page you can manage several options of your account. Also you can
   get current statistics of you characters. Please choose one option 
   below:

   <ul>
        <li>View your character stats</li>
        <li>Change your password</li>
        <li>Change your mailaddress</li>
   </ul>   
</p>

<p>
<? if ($this->user->isBanned())
   {
       echo "Your account is banned until ". date(lang('date_time_format') .". ",
        $this->user->isBanned());
   }
   else
   {
    echo "You are a member of the following access groups:
    <ul>";
        foreach ($groups as $group)
        {
            echo "<li>$group</li>";
        }
    echo "</ul>";
   }
?>
This account is registered since <strong><?= date(lang('date_time_format'), 
    $this->user->getRegistrationDate()) ?></strong>. Your last login was 
    <strong><?= date(lang('date_time_format'), 
    $this->user->getLastLogin()) ?></strong>.
</p>


<h3>Character overview</h3>

<?php if ($this->user->hasCharacters()){ ?>

<p>Here you see a summary of all your characters. Click on the name
of one to see its details.</p>

<table class="datatable">
<tr>
    <th>Name</th>
    <th width="20">Level</th>
    <th width="20">Gender</th>
    <th>Money</th>
    <th>Map</th>
</tr>
<?php foreach ($this->user->getCharacters() as $char){ ?>
<tr>
    <td><a href="<?= site_url('charcontroller/' . 
        $char->getID()) ?>"><?= $char->getName() ?></a></td>
    <td align="right"><?= $char->getLevel() ?></td>
    <td align="center"><?= $char->getGender('image') ?></td>
    <td align="right"><?= $char->getMoney('string') ?></td>
    <td><?= $char->getMap()->getDescription() ?></td>
</tr>
<? } ?>
</table>    

<?php } else {
    // user has no characters 
?>
    <p>You currently don't have any characters. This is is a little uncommon,
    but never mind: You can create one with the Mana client.</p>

<?php } ?>

