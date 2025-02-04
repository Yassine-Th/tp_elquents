<x-nav></x-nav>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Our Application</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

  <!-- Navigation Bar -->
 

  <!-- Welcome Section -->
  <div class="container mt-5">
    <div class="text-center">
      <h1 class="display-4">Welcome to Our Application!</h1>

    </div>

    <!-- Features Section -->
    <div class="row mt-4">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">
            <h5 class="card-title"><i class="bi bi-person-lines-fill"></i> Clients</h5>
            <p class="card-text">View and manage all your clients easily.</p>
            <a href="{{ route('clients.index') }}" class="btn btn-primary">View Clients</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">
            <h5 class="card-title"><i class="bi bi-box"></i> Products</h5>
            <p class="card-text">Add, edit, and manage your products.</p>
            <a href="{{ route('produits.index') }}" class="btn btn-primary">View Products</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">
            <h5 class="card-title"><i class="bi bi-tags-fill"></i> Categories</h5>
            <p class="card-text">Organize your products into categories for better management.</p>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">View Categories</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">
            <h5 class="card-title"><i class="bi bi-file-earmark-text"></i> Commands</h5>
            <p class="card-text">Track and manage orders placed by your clients.</p>
            <a href="{{ route('commands.index') }}" class="btn btn-primary">View Orders</a>
          </div>
        </div>
      </div>
    </div>

    

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
