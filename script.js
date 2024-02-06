function selectUser(userid){
    $.ajax({
        type: "GET",
        url: "getUser.php",
        dataType: "json",
        data: { id: userid },
        success: function(record) {
            // Handle the received record data
            console.log(record);

            $('#userId').val(record.userid);
            $('#firstName').val(record.first_name);
            $('#lastName').val(record.last_name);

            // alert('Selected row with ID: ' + rowId + '\nRecord Data: ' + JSON.stringify(record));
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

$(document).ready(function () {

    $("#message").hide();
    getAllUsers();

    $("#addUserForm").submit(function(event){
        event.preventDefault();
        
        validateFormData();

    });

    function validateFormData(){
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();

        const nameRegex = /^[A-Za-z]+$/;
        if(nameRegex.test(firstName)){
            if(nameRegex.test(lastName)){
                // return true;
                // alert(firstName+" "+lastName);
                submitFormData();
            }
            else{
                alert(lastName+" is not valid");
                return false;
            }
        }
        else{
            alert(firstName+" is not valid");
            return false;
        }
    }

    function submitFormData(){
        var formData = $("#addUserForm").serialize();

        var uid = $("#userId").val();

        if(uid !== null && uid !== ""){
            //update user record
            $.ajax({
                type: "POST",
                url: "updateUser.php", 
                dataType: "json",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    console.log(response.status);
                    console.log(response.message);

                    // cleated previous message
                    $("#message").empty();
                    // Display success or error message
                    if (response.status === 'success') {
                        getAllUsers();
                        showMessage(response.message, response.status);
                    }
                    else {
                        getAllUsers();
                        showMessage(response.message, response.status);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                    $("#message").append('<div class="alert alert-danger" role="alert">'+response.message+'</div>');
                }
            });
        }
        else{
            //save new record
            // Send data using AJAX
            $.ajax({
                type: "POST",
                url: "saveUser.php", 
                dataType: "json",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    console.log(response.status);
                    console.log(response.message);

                    // cleated previous message
                    $("#message").empty();
                    $("#message").show();

                    // Display success or error message
                    if (response.status === 'success') {
                        getAllUsers();
                        showMessage(response.message, response.status);
                    }
                    else {
                        getAllUsers();
                        showMessage(response.message, response.status);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                    $("#message").append('<div class="alert alert-danger" role="alert">'+response.message+'</div>');
                }
            });
        }
        
    }

    function getAllUsers(){
        $.ajax({
            type: "GET",
            url: "getAllUsers.php", 
            dataType: "json",
            success: function(data) {
                // Populate the table with the fetched data
                $('#userListTable tbody').empty();
                var count=0;
                if(data.length>0){
                    $.each(data, function(index, row) {
                        var newRow = '<tr>' +
                            '<td>' + (++count) + '</td>' +
                            '<td>' + row.first_name + '</td>' +
                            '<td>' + row.last_name + '</td>' +
                            '<td><button type="button" id="btnSelect" onclick="selectUser(' + row.userid + ')" class="btn btn-outline-dark btn-block btn-sm">Select</button></td>' +
                            // Add more columns as needed
                            '</tr>';
                        
                        $('#userListTable tbody').append(newRow);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function showMessage(message, status) {
        if(status=="success"){
            $("#message").append('<div class="alert alert-success text-center" role="alert">' + message + '</div>');
        }
        else{
            $$("#message").append('<div class="alert alert-danger text-center" role="alert">' + message + '</div>');
        }
        // Append message and set timeout to remove it after 3 seconds (adjust as needed)
        setTimeout(function() {
            $(".card-footer").fadeOut(500, function() {
                $(this).remove();
            });
        }, 1000); // 1000 milliseconds (1 seconds)
    }

}); 