// $(function(){
//     $('#current').keyup(function(){
//         var current= $("#current").val();
//         // alert(current);
//         $.ajax({
//             type:"post",
//             url:"admin/check-pswd",
//             data:{current:current},
//             success:function(resp){
//                 alert(resp);
//             },error:function(){
//                 alert("Error");
//             }
//         })
//     })
// });

// Password Confirmation and validation

jQuery(function() {
    // Update employee Status
    $(document).on("click", ".updateEmployeeStatus", function() {
        var status = $(this)
            .children("i")
            .attr("status");
        var employee_id = $(this).attr("employee_id");
        $.ajax({
            type: "post",
            url: "/admin/update-employee-status",
            data: { status: status, employee_id: employee_id },
            success: function(resp) {
                if (resp["status"] == 0) {
                    $("#employee-" + employee_id).html(
                        "<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>"
                    );
                } else if (resp["status"] == 1) {
                    $("#employee-" + employee_id).html(
                        "<i class='mdi mdi-toggle-switch' status='Active'></i>"
                    );
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // Update company Status
    $(document).on("click", ".updateCompanyStatus", function() {
        var status = $(this)
            .children("i")
            .attr("status");
        var company_id = $(this).attr("company_id");
        $.ajax({
            type: "post",
            url: "/admin/update-company-status",
            data: { status: status, company_id: company_id },
            success: function(resp) {
                if (resp["status"] == 0) {
                    $("#company-" + company_id).html(
                        "<i class='mdi mdi-toggle-switch-off' status='Disabled'></i>"
                    );
                } else if (resp["status"] == 1) {
                    $("#company-" + company_id).html(
                        "<i class='mdi mdi-toggle-switch' status='Active'></i>"
                    );
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    //   Confirmation Delete

    $(".confirmDelete").click(function() {
        var name = $(this).attr("name");
        if (confirm("Are you sure you want to delete this " + name + "?")) {
            return true;
        } else {
            return false;
        }
    });
});
