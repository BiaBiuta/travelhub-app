<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <!-- DataTales Example -->
    <div>
        <select id="selectFormDepartment" class=" form-select" aria-label="Default select example">
            <option value="-1" selected>ALL</option>
        </select>
    </div>
    <div class=" card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead id="usersTable">
                        <tr>
                            <th>#</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                            <th>Departments</th>

                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                    </tbody>
                </table>
            </div>
        </div>
        <div id="alertDivButton" class=" alert alert-warning hidden  alert-dismissible fade show" hidden role="alert">
            <strong>S-a sters cu succes</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

</div>