<div style="float: right; padding-top: 2vw; margin-right: 2vw">
<input id="trash" type="image" class="imgBtn" src="../../../assets/images/trash.jpg">
</div>
<div class="container-table100">
    <div class="wrap-table100">
        <div class="table100">
            <table id="tableMain">
                <thead>
                <tr class="table100-head">
                    <th></th>
                    <th>Student ID</th>
                    <th>Date Registered</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($StudentsProfile as $Student) {
                    $studentName = $Student->getName() . ' ' . $Student->getLastName();
                    $birthday = Util::date($Student->getBirthday());
                    $dateRegistered = Util::date($Student->getDateRegistered());
                    ?>
                    <tr id="<?= $Student->getID() ?>">
                        <td><input type="checkbox" class="deleteRow" value="<?= $Student->getID() ?>"></td>
                        <td><?= $Student->getID() ?></td>
                        <td><?= $dateRegistered ?></td>
                        <td><?= $studentName ?></td>
                        <td><?= $Student->getEmailAddress() ?></td>
                        <td><?= $Student->getContactNumber() ?></td>
                        <td><?= $birthday ?></td>
                        <td><?= $Student->getAge() ?></td>
                        <td><?= $Student->getAddress() ?></td>
                        <td><button class="ajaxUpdate btn btn-info" data-toggle="modal" data-target="#myModal" value="<?= $Student->getID() ?>">Update</button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>