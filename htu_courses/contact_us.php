<?php require './header.php' ?>
<div class="htu_contact container">
    <form action="action_page.php">

        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        <label for="country">Country</label>
        <select id="country" name="country">
            <option value="australia">Amman</option>
            <option value="canada">Zarqa</option>
            <option value="usa">Irbid</option>
        </select>

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        <input type="submit" value="Submit">
    </form>
</div>
<?php require './footer.php' ?>