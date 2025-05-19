<!-- Includes the header file (contains opening HTML tags, navigation bar, and linked stylesheets) -->
<?php include('includes/header.php'); ?>

<?php
// Include authentication utilities
include('includes/auth.php');

// Enforce user login; redirects or blocks access if not logged in
requireLogin(); // restrict access to logged-in users
?>


<!-- Greet the logged-in user. Using htmlspecialchars() ensures the username is displayed as plain text -->
<h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
<p>Here are community stories.</p>

<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Community Stories</h2>

    <!-- Loader message displayed while stories are being fetched -->
    <div id="loading" class="text-center mb-4" style="display: none;">
      <p>Loading stories...</p>
    </div>

    <!-- Container where fetched stories will be inserted -->
    <div id="storyList" class="row"></div>
  </div>
</section>

<!-- jQuery library from CDN for AJAX and DOM manipulation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
    // Show the loading message when the page is ready
    $("#loading").show();

    // Perform AJAX GET request to fetch stories
    $.ajax({
      url: 'controller/stories_fetch.php', // Server script that returns stories HTML
      method: 'GET',
      success: function (data) {
        // On success, hide the loading message
        $("#loading").hide();
        // Inject the received HTML content into the storyList div
        $("#storyList").html(data);
      },
      error: function () {
        // On error, display a failure message inside the loading div
        $("#loading").html("<p class='text-danger'>Failed to load stories.</p>");
      }
    });
  });
</script>

<!-- Includes the footer file (contains closing tags and Bootstrap JS bundle) -->
<?php include('includes/footer.php'); ?>