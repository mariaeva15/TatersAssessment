<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Maria Evangelicalyn Ong">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/all.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/toast/toast.min.css">
    <script src="<?php echo site_url(); ?>assets/toast/jqm.js"></script>
    <script src="<?php echo site_url(); ?>assets/toast/toast.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var reportTypeSelect = document.getElementById('report_type');
            var ageFilter = document.getElementById('age_filter');

            function toggleAgeFilter() {
                ageFilter.style.display = reportTypeSelect.value === 'users_by_age' ? 'block' : 'none';
            }

            toggleAgeFilter();

            reportTypeSelect.addEventListener('change', toggleAgeFilter);
        });
    </script>
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9 text-center">
                    <div class="my-5">
                        <img src="<?php echo site_url(); ?>assets/taters.jpg" alt="logo" width="100">
                    </div>

                    <div class="card text-white bg-primary">
                        <img class="card-img-top" src="holder.js/100px180/" alt="">
                        <div class="card-body">
                            <?php
                            $username = $this->session->userdata('username');
                            echo '<h4 class="card-title">Hello ' . $username . ', welcome to my Test Page</h4>';
                            ?>
                            <p class="card-text">Users</p>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-12 col-md-6">
                            <h5 class="mb-3">Query Reports</h5>
                            <form action="<?php echo site_url('report_controller/generate_report'); ?>" method="post">
                                <label for="report_type">Select Report Type:</label>
                                <select name="report_type" id="report_type" class="form-control">
                                    <option value="all_data">All Data</option>
                                    <option value="users_by_barangay">Users by Barangay</option>
                                    <option value="users_by_municipality">Users by Municipality</option>
                                    <option value="users_by_age">Users by Age</option>
                                    <option value="users_by_gender">Users by Gender</option>
                                </select>

                                <div id="age_filter" style="display: none;">
                                    <label for="age">Enter Age:</label>
                                    <input type="number" name="age" id="age" class="form-control" min="1" max="100">
                                </div>

                                <input type="submit" class="btn btn-primary mt-3" value="Generate Report">
                            </form>

                            <div class="mt-3 text-center">
                                <h5>Report</h5>
                                <?php if (!empty($report)): ?>
                                    <div class="mx-auto">
                                        <table class="table mx-auto">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Barangay</th>
                                                    <th>Municipality</th>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($report as $user): ?>
                                                    <tr>
                                                        <td><?php echo $user->username; ?></td>
                                                        <td><?php echo $user->firstname; ?></td>
                                                        <td><?php echo $user->lastname; ?></td>
                                                        <td><?php echo $user->email; ?></td>
                                                        <td><?php echo $user->barangay; ?></td>
                                                        <td><?php echo $user->municipality; ?></td>
                                                        <td><?php echo $user->age; ?></td>
                                                        <td><?php echo $user->gender; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else: ?>
                                    <p>No data to display.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="<?php echo site_url('Auth/logout'); ?>" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                    </div>

                    <div class="mt-5 text-muted">
                        Copyright &copy; 2023 &mdash; Maria Evangelicalyn Ong
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        <?php if ($this->session->flashdata('suc')): ?>
            toastr.success("<?php echo $this->session->flashdata('suc'); ?>");
        <?php elseif ($this->session->flashdata('worng')): ?>
            toastr.error("<?php echo $this->session->flashdata('worng'); ?>");
        <?php elseif ($this->session->flashdata('warning')): ?>
            toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
        <?php elseif ($this->session->flashdata('info')): ?>
            toastr.info("<?php echo $this->session->flashdata('info'); ?>");
        <?php endif; ?>

        <?php $this->session->unset_userdata('suc'); ?>
        <?php $this->session->unset_userdata('worng'); ?>
    </script>

    <script>
        document.getElementById('report_type').addEventListener('change', function () {
            var ageFilter = document.getElementById('age_filter');
            this.value === 'users_by_age' ? ageFilter.style.display = 'block' : ageFilter.style.display = 'none';
        });
    </script>
</body>

</html>
