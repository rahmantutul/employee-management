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
    // Employee Data filter

    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = "throw";
        fill_dataTable();
        function fill_dataTable(
            filter_city = "",
            filter_company = "",
            filter_join_date = ""
        ) {
            var dataTable = $("#employeeData").DataTable({
                searching: false,
                paging: false,
                serverSide: true,
                ajax: {
                    url: "/admin/employee",
                    data: {
                        filter_city: filter_city,
                        filter_company: filter_company,
                        filter_join_date: filter_join_date
                    },
                    columns: [
                        {
                            data: "id",
                            name: "id"
                        },
                        {
                            data: "status",
                            name: "status"
                        },
                        {
                            data: "first_name",
                            name: "first_name"
                        },
                        {
                            data: "last_name",
                            name: "last_name"
                        },
                        {
                            data: "city",
                            name: "city"
                        },
                        {
                            data: "logo",
                            name: "logo"
                        },
                        {
                            data: "email",
                            name: "email"
                        },
                        {
                            data: "join_date",
                            name: "join_date"
                        },
                        {
                            data: "company_id",
                            name: "company_id"
                        },
                        {
                            data: "phone",
                            name: "phone"
                        }
                    ],
                    columnDefs: [
                        {
                            defaultContent: "-",
                            targets: "_all"
                        }
                    ]
                }
            });
        }
    });

    $("#filter").click(function() {
        var filterCity = document.getElementById("#filterCity").value;
        var filter_company = $("#filerCompany").val();
        var filter_join_date = $("#filerJoinDate").val();
        alert(filterCity);
        die;
        if (
            filter_city != "" &&
            filter_company != "" &&
            filter_join_date != ""
        ) {
            $("#employeeData")
                .DataTable()
                .destroy();
            fill_dataTable(filter_city, filter_company, filter_join_date);
        } else {
            console.log("Please select both filters");
        }
    });
    $("#reset").on("click", function() {
        $("#filerCity").val("");
        $("#filerCompany").val("");
        $("#filerJoinDate").val("");
        $("#employeeData")
            .DataTable()
            .destroy();
        fill_dataTable();
    });
});
