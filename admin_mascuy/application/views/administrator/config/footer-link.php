<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>


<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );

    function addModalAction(){
        let formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            password1: $("#password1").val(),
            password2: $("#password2").val(),
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()."index.php/User/addUserAPI"?>",
            data: formData,
            success: function(data){
                alert("Berhasil menginput data")
                window.location.reload()
            },
            error: function(xhr){
                json_err = JSON.parse(xhr.responseText)
                const { name, email, password1, password2 } = json_err;
                $("#name-helper").text(name); 
                $("#email-helper").text(email); 
                $("#password1-helper").text(password1); 
                $("#password2-helper").text(password2); 
            }
        });
    }
</script>

</body>

</html>
