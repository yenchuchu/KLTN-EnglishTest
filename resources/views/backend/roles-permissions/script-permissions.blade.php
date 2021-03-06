<script>

    // hàm gửi ajax và xóa role
    function deletePermissions(id){
        // tìm đến các thẻ có chứa id này để lấy thông tin gửi ajax lên

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            document.getElementById('id-loader-css1').style.display = "block";
            $(".row button").prop('disabled', true);

            url = 'manager-roles-permissions/delete-permissions';

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    permission_id: id,
                },
                success: function (data) {

                    if (data.code == 404 ) {
                        document.getElementById('id-loader-css1').style.display = "none";
                        $(".row button").prop('disabled', false);

                        swal('', data.message, 'error').catch(swal.noop);
                    } else {
                        document.getElementById('id-loader-css1').style.display = "none";
                        $(".row button").prop('disabled', false);

                        $('#reload-table-manager-permissions').html(data);
                        setTableInit('manager_permissions');

                        // Alert message success
                        swal( 'Delete permission success!', '', 'success');
                    }

                },
                error: function(){
                    document.getElementById('id-loader-css1').style.display = "none";
                    $(".row button").prop('disabled', false);

                    swal('', 'Không thực hiện được hành động này!', 'error').catch(swal.noop);
                }
            });


        });



    }

</script>