<?php
include "antet.php";
include "func.php";

$gen_stats = gen_stats(48);

include 'page.header.php';
?>

<div class="container">
    <dl>
        <dt>1. How do I create a town?</dt>
        <dd>A: Go to the "towns" link in the upper menu; then you will see "create capital" if you do not have one yet, or
            "create new town" is you already have a capital.</dd>

        <dt>2. Why can't I create a new town?</dt>
        <dd>A: Well, there are 2 possible reasons: you do not have a level 10 main building in your capital city or you do
            not have at least 10 colonists in your capital city.</dd>

        <dt>3. Why isn't my town producing any resources?</dt>
        <dd>A: You need to construct the economy buildings first, then upgrade them. Be careful, at first you will need a
            good stock of crop, for each time you build/upgrade something the population increases, and with it, so does
            the upkeep. In plain terms, the more you build/upgrade, the lesser crop your town will produce. So be sure to
            keep a good look at the crop production indicator so that it doesn't reach negative values.</dd>

        <dt>4. What does purge mean?</dt>
        <dd>A: You can purge(destroy) your colonies, but not your capital.</dd>

        <dt>5. What happens when I abandon a town?</dt>
        <dd>A: It becomes marked as abandoned, and any user can aquire it as his own.</dd>

        <dt>6. What faction should I choose?</dt>
        <dd>A: the Empire is the balanced faction, while the Guild is oriented towards economy and the Order towards
            warfare. Each has it's advantages and disadvantages, which makes them quite balanced in the overall picture.
            Choose the one most suitable to your character.</dd>

        <dt>7. How can I attack another town?</dt>
        <dd>A: First of all you need to forge weapons for your future troops(construct the proper building), then you can
            research new troops(their HP, attack &amp; defense) and finally train them. You can attack another town from the
            "dispatch" page; you will see in the center of your town a small crossroad sign. Click it to go to the
            dispatch page.<br>
            Here you can also simulate infinite combat situations using the combat simulator, and you can promote an
            existing unit to the rank of general.</dd>

        <dt>8. What does the general do?</dt>
        <dd>A: He is the elite unit of your army. You can send him along with an army when attacking/raiding/spying a town.
            If there was a victorious attack, he will gain a level and increase in his skills. You can always promote
            another unit to the rank of general, but it will start from level 1.</dd>

        <dt>9. How can I produce gold?</dt>
        <dd>A: Gold is obtained from taxes. You can set a tax rate for your population at the main building of a maximum
            value of 210. Beware, for the morale of the people is affected by taxes.</dd>

        <dt>10. What is "morale"?</dt>
        <dd>A: Morale is a percentage number that represents the actual resource production. Meaning that for a morale
            of 90%, for example, your town will produce only 90% of the shown resource production rates.<br>
            A morale of 100% will ensure that no resources are lost.<br>
            You can boost the morale of the population by building a cathedral and upgrading it.</dd>

        <dt>11. How can I create or join an alliance?</dt>
        <dd>A: To create an alliance, you first need to build the embassy (or whatever name the designated building may
            have for your faction; read carefully in the main building constructions options and you will see a short
            description for all buildings).<br>
            To join an alliance you need to have an invitation. To get one, try contacting the alliance founder.</dd>

        <dt>12. How can I rename a town?</dt>
        <dd>A: In the town view page [the one with all the buildings...], you will see a signpost at the bottom; click
            it and you will be taken to the town rename and description edit page.</dd>

        <dt>13. How can I change my password?</dt>
        <dd>A: In the upper menu you have "profile"; click it and you will be taken to the profile page. There you can
            edit you profile's description, you can designate a sitter, change the graphic pack path, change your password
            or have your account queued for deletion.</dd>

        <dt>14. What is a "sitter"?</dt>
        <dd>A: A sitter is a player who looks after your towns when you cannot login and look after them yourself. An
            account "sitter".<br>
            You can change your account sitter in the "profile" page.<br>
            Remember that a sitter cannot change your password or do any actions that require your password.</dd>

        <dt>15. I cannot join an alliance. I get the message to quit my current alliance. What do I do?</dt>
        <dd>A: You need to build an embassy and quit your current alliance in order to join another.</dd>

        <dt>16. How do I create an army?</dt>
        <dd>First you need the required buildings: academy(for HP(hit points) upgrades), blacksmith(for ATK(attack) and
            DEF(defense) upgrades), barracks(this is where the troop training takes place), weapon &amp; armor shop(for
            forging weapons), weapon warehouse(for storing required weapons), stable(for breeding horses required for
            mounted troops), port(for building vessels).<br>
            Before you can train a type of troops, you need to make sure that they are at least level 1 in HP, ATK and DEF
            and that you have enough required weapons in your weapon warehouse(see troop description for required
            weapons).<br>
            You can then train troops at the barracks.</dd>

        <dt>17. How do I create a new map?</dt>
        <dd>You create a map in an image editor like Paint. The data is decoded by the program [map_extractor.exe] using
            color coded information.<br>
            A map has 3 types of terrain:<br>
            0x: water [where x is the id of the body of water; 2 bodies of water are not suppose to be in direct contact
            with each other];<br>
            1x: land where towns can be built [x marks the id of the displayed image; if x=0, the install.php will pick
            a random terrain image];<br>
            2x: mountains; here towns cannot be built [x marks the id of the displayed image; if x=0, the install.php
            will pick a random terrain image];<br>
            The color codes:<br>
            a sector of water will be a pixel with the RGB code of: x 0 255;<br>
            a sector of land will be a pixel with the RGB code of: x 255 0;<br>
            a sector of mountains will be a pixel with the RGB code of: 255 x 0</dd>

        <dt>18. How can I conquer a town?</dt>
        <dd>In order to do that, you need to attack that town, win the battle and have, at the end of the battle, at least
            100 colonists remaining.</dd>
    </dl>
</div>
<?php
include 'page.footer.php';
?>
