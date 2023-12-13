<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Maria Evangelicalyn D. Ong">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="<?php echo site_url();?>assets/all.css">
    <link rel="stylesheet" href="<?php echo site_url();?>assets/toast/toast.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?php echo site_url();?>assets/toast/jqm.js"></script>
    <script src="<?php echo site_url();?>assets/toast/toast.js"></script>

    <script>
        $(document).ready(function () {
            // Change event for the municipality dropdown
            $("#municipality").change(function () {
                var municipality_id = $(this).val();
                $.ajax({
                    url: '<?php echo site_url('Auth/getLocations'); ?>',
                    method: 'post',
                    data: { municipality_id: municipality_id },
                    dataType: 'json',
                    success: function (barangays) {
                        $('#barangay').empty().append('<option value="" disabled selected>Select Barangay</option>');
                        $.each(barangays, function (key, value) {
                            $('#barangay').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error);
                    }
                });
            });
        });
    </script>
 </head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="<?php echo site_url();?>assets/taters.jpg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
					<div class="card-body p-5">
						<h1 class="fs-4 card-title fw-bold mb-4">Sign Up</h1>
						<?php echo form_open('Auth/registration_form'); ?>
						
						<!-- Username -->
						<div class="mb-3">
							<label class="mb-2 text-muted" for="username">Username</label>
							<input id="username" name="username" type="text" class="form-control" required pattern="[a-zA-Z0-9]+">
						</div>

						<!-- Password -->
						<div class="mb-3">
							<label class="mb-2 text-muted" for="password">Password</label>
							<input id="password" name="password" type="password" class="form-control" required pattern="[a-zA-Z0-9]+">
						</div>

						<!-- Confirm Password -->
						<div class="mb-3">
							<label class="mb-2 text-muted" for="con_password">Confirm Password</label>
							<input id="con_password" name="con_password" type="password" class="form-control" required pattern="[a-zA-Z0-9]+">
						</div>

						<!-- Last Name -->
						<div class="mb-3">
							<label class="mb-2 text-muted" for="lastname">Last Name</label>
							<input id="lastname" name="lastname" type="text" class="form-control" required>
						</div>

						<!-- First Name -->
						<div class="mb-3">
							<label class="mb-2 text-muted" for="firstname">First Name</label>
							<input id="firstname" name="firstname" type="text" class="form-control" required>
						</div>


						<!-- Address -->
						<div class="mb-3">
							<label class="mb-2 text-muted" for="address">Address</label>
							<input id="house" name="house" type="text" class="form-control" placeholder="TEI Center, 3536 Hilario Street" required>

							<select id="municipality" name="municipality" class="form-control" required>
								<option value="" disabled selected>Select Municipality</option>
								<?php foreach ($municipalities as $municipality) : ?>
									<option value="<?php echo $municipality['id']; ?>"><?php echo $municipality['name']; ?></option>
								<?php endforeach; ?>
							</select>

							<!-- Barangay Dropdown -->
							<select id="barangay" name="barangay" class="form-control" required>
								<option value="" disabled selected>Select Barangay</option>
							</select>

							<input id="mobile_number" name="mobile_number" type="tel" class="form-control" placeholder="Mobile Number" required pattern="[0-9]{11}">
							<input id="age" name="age" type="number" class="form-control" placeholder="Age" required min="1" max="100">
							<select id="gender" name="gender" class="form-control" required>
								<option value="" disabled selected>Select Gender</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
						</div>

						<!-- Email Address -->
						<div class="mb-3">
							<label class="mb-2 text-muted" for="email">E-Mail Address</label>
							<input id="email" name="email" type="email" class="form-control" required>
						</div>
								<div class="d-flex align-items-center">
								
									<button type="submit" class="btn btn-primary ">
										Register
									</button>
								</div>
							<?php echo form_close(); ?>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Have an account? <a href="<?php echo site_url();?>Auth" class="text-dark"> Login</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
					Copyright &copy; 2023 &mdash; Maria Evangelicalyn Ong
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
    $(document).ready(function () {
        // Change event for the municipality dropdown
        $("#municipality").change(function () {
            var municipality_id = $(this).val();
            $.ajax({
                url: '<?php echo site_url('Auth/getLocations'); ?>',
                method: 'post',
                data: { municipality_id: municipality_id },
                dataType: 'json',
                success: function (barangays) {
                    $('#barangay').empty().append('<option value="" disabled selected>Select Barangay</option>');
                    $.each(barangays, function (key, value) {
                        $('#barangay').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>

    <script type="text/javascript">


<?php if($this->session->flashdata('suc')){ ?>
    toastr.success("<?php echo $this->session->flashdata('suc'); ?>");
<?php }else if($this->session->flashdata('worng')){  ?>
    toastr.error("<?php echo $this->session->flashdata('worng'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
<?php
	$this->session->unset_userdata ( 'suc' ); ?>
	
	<?php
    $this->session->unset_userdata ( 'worng' ); ?>

</script>
</body>
</html>