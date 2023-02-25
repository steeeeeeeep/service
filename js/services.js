
$(function() {
    $("#search").click(function() {
        var barangay = $("#barangay").val();
        var service_type = $("#txt").val();
        var sched_date = $("#sched_date").val();

        if (barangay == "none" || service_type == "none" || sched_date == 'none') {
            alert("Don't leave fields empty!");
            tbody = "<tr><td colspan='6'>please </td></tr>";
        } 
        else {
            $.post('../scripts/searchproviders.php', {
                barangay: barangay,
                service_type: service_type,
                sched_date: sched_date
            }, function(res) {
                var providers = JSON.parse(res);
                var tbody = "";

                if (providers.failed == true) {
                    tbody = "<tr><td colspan='7'>Sorry, there is No Service Providers found!</td></tr>";
                } else {
                    for (var i = 0; i < providers.length; i++) {
                        var provider = providers[i];
                        var booklink = '';
                        if(provider.availability === 'available'){
                            booklink = "<td><a href='booking.php?provider=" + provider.provider_id +"&sched_date=" + sched_date + "&barangay=" + barangay + "' class='book'>Book</a></td>"
                        }
                        else{
                            booklink = "<td><a class='book' style='background-color:gray'>Unavailable</a></td>"
                        }
                        tbody += "<tr>" +
                            "<td><img style='height:100px; width:100px;border-radius:100%;' src='../user_images/" + provider.photo +
                            "'/></td>" +
                            "<td>" + provider.firstname + " " + provider.lastname + "</td>" +
                            "<td>" + "<br>" + provider.barangay +
                            ",<br>" +
                            provider.street + "</td>" +
                            "<td>" + provider.service_type + "</td>" + 
                            "<td>" + provider.service_fee + "</td>" +
                            "<td>" + provider.rating + "/5" + "</td>" +
                            booklink
                            
                        }
                    
                }
                $("#table-head tbody").html(tbody);
            });
        }
    });
});