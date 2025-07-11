<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Control Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" id="openModalBtn">
            Open Modal
        </button>
        <!-- The Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="uploadForm" method="POST" enctype="multipart/form-data">
                            <input type="file" name="photo" id="photo">
                            <p>Descrierea pozei</p>
                            <textarea id="description" cols="40" rows="2" name="description"></textarea>
                        </form>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Open Modal
        document.getElementById('openModalBtn').addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('addModal'));
            myModal.show();
        });

        // Handle Upload Button Click
        document.getElementById('uploadButton').addEventListener('click', function() {
            var form = document.getElementById('uploadForm');
            var formData = new FormData(form);

            fetch('http://localhost/backend_travel/users/profile.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log("Upload successful:", data);
                    // Handle successful upload here
                    // Optionally, close the modal here
                    var myModal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
                    if (myModal) {
                        myModal.hide();
                    }
                })
                .catch(error => {
                    console.error("Upload failed:", error);
                });
        });
    </script>
</body>

</html>