<?php
// Include the database connection file
include('../includes/db.php');

// Check if the database connection failed, and stop execution with an error message if so
if ($connection->connect_error) {
    die("DB Connection failed.");
}

// SQL query to fetch all approved stories, sorted by newest first
$sql = "SELECT name, age, story, created_at FROM `stories` WHERE is_approved = 1 ORDER BY created_at DESC";

// Execute the SQL query
$result = $connection->query($sql);

// Check if any stories were returned
if ($result->num_rows > 0):
    // Loop through each story
    while ($row = $result->fetch_assoc()): ?>
    
        <!-- Start of a single story card using Bootstrap layout -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <!-- Display the author's name and age -->
                    <h5 class="card-title">
                        <?php echo htmlspecialchars($row['name']); ?> 
                        <small class="text-muted">(<?php echo $row['age']; ?> yrs old)</small>
                    </h5>
                    
                    <!-- Display the story content, converting newlines to <br> for formatting -->
                    <p class="card-text">
                        <?php echo nl2br(htmlspecialchars($row['story'])); ?>
                    </p>
                </div>
                
                <!-- Display the date the story was created -->
                <div class="card-footer text-muted">
                    Shared on <?php echo date("F j, Y", strtotime($row['created_at'])); ?>
                </div>
            </div>
        </div>
        <!-- End of story card -->

    <?php endwhile;
else:
    // If no approved stories exist, display a friendly message
    echo '<div class="col-12 text-center"><p>No stories available yet.</p></div>';
endif;

// Always close the database connection to free resources
$connection->close();
?>