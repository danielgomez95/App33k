jQuery(document).ready(function () {

    var studentID;
    var firstName;
    var middleName;
    var lastName;
    var age;
    var birthday;
    var emailAddress;
    var address;
    var contactNumber;

    jQuery("#trash").click(function () {
        if (confirm("Are you sure you want to delete this?")) {
            var id = [];
            jQuery(':checkbox:checked').each(function (i) {
                id[i] = jQuery(this).val();
            });
            if (id.length == 0) {
                alert("Please select checkboxes");
            } else {
                jQuery.ajax({
                    cache: false,
                    type: "post",
                    url: "../../../scripts/ajax/studentProfileAJAX.php",
                    data: {
                        case: 'DELETE',
                        studentID: id
                    },
                    success: function (data) {
                        jQuery(':checkbox:checked').each(function () {
                            jQuery("tr#"+jQuery(this).val()).remove();
                        });
                    },
                    error: function (data) {
                    }
                });
            }
        } else {
            return false;
        }
    });

    jQuery("#modalSave").click(function () {
        jQuery.ajax({
            cache: false,
            type: "post",
            url: "../../../scripts/ajax/studentProfileAJAX.php",
            data: {
                case: 'UPDATE',
                studentID: studentID,
                firstName: jQuery("#firstName").val(),
                middleName: jQuery("#middleName").val(),
                lastName: jQuery("#lastName").val(),
                age: jQuery("#age").val(),
                emailAddress: jQuery("#email").val(),
                address: jQuery("#address").val(),
                contactNumber: jQuery("#contact").val()
            },
            success: function (data) {
                location.reload(true);
            },
            error: function (data) {
            }
        });
    });

    jQuery("#tableMain tbody tr").click(function () {
        var tableData = jQuery(this).children("td").map(function () {
            return jQuery(this).text();
        }).get();
        studentID = tableData[1];
        jQuery.ajax({
            cache: false,
            type: "post",
            url: "../../../scripts/ajax/studentProfileAJAX.php",
            data: {
                case: 'GET_NAMES',
                studentID: studentID
            },
            dataType: 'json',
            success: function (data) {
                firstName = data.firstName;
                middleName = data.middleName;
                lastName = data.lastName;
                emailAddress = tableData[4];
                contactNumber = tableData[5];
                birthday = tableData[6];
                age = tableData[7];
                address = tableData[8];
                jQuery("#firstName").val(firstName);
                jQuery("#middleName").val(middleName);
                jQuery("#lastName").val(lastName);
                jQuery("#email").val(emailAddress);
                jQuery("#age").val(age);
                jQuery("#birthday").val();
                jQuery("#contact").val(contactNumber);
                jQuery("#address").val(address);
            },
            error: function (data) {
            }
        });
    });
});