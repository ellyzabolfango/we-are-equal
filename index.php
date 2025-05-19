<!-- Include the common header (doctype, head section, navbar, etc.) -->
<?php include('includes/header.php'); ?>

<!-- Home Section -->
<section id="home" class="text-center py-5 bg-warning text-dark">
    <div class="container">
        <!-- Main headline -->
        <h1 class="display-4">We Are Equal</h1>
        
        <!-- Supporting tagline -->
        <p class="lead">Empowering every gender, every voice.</p>
        
        <!-- Image placeholder with Bootstrap responsive class -->
        <img src="" class="img-fluid my-3" alt="pic1">
        
        <!-- Call-to-action buttons -->
        <a href="story_list.php" class="btn btn-dark mr-2">Read Each Story</a>
        <a href="#action" class="btn btn-light">Join the Movement</a>
    </div>
</section>

<section id="about" class="py-5 bg-light">
    <div class="container text-center">
        <h2>About the Campaign</h2>
        <p class="lead">“We Are Equal” is a gender equality awareness campaign committed to breaking down
            barriers, educating communities, and inspiring people to stand together for a more inclusive future. We
            believe that equality is not just a goal — it's a right for all.</p>
        <img src="" class="img-fluid mt-3" alt="pic2">
    </div>
</section>

<section id="resources" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Resources</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="" class="img-fluid mb-2" alt="pic3">
                <h5>Education Materials</h5>
                <p>Explore lesson plans, guides, and articles that provide foundational knowledge on gender roles,
                    equality, and advocacy.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="" class="img-fluid mb-2" alt="pic4">
                <h5>Statistics</h5>
                <p>Discover up-to-date data on gender gaps in leadership, education, healthcare, and economic
                    opportunity worldwide.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="" class="img-fluid mb-2" alt="pic5">
                <h5>External Links</h5>
                <p>Connect with organizations like UN Women, WHO, and Amnesty International to access reliable
                    gender equality resources.</p>
            </div>
        </div>
    </div>
</section>

<section id="engagement" class="py-5 bg-light">
    <div class="container text-center">
        <h2>Engagement</h2>
        <p class="lead">Join a global conversation on gender equality. Read personal experiences, share your story, and
            get involved in online discussions that inspire empathy, learning, and collective action.</p>
        <img src="" class="img-fluid mt-3" alt="pic6">
        <a href="#" class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#storyModal">
            Share Your Story
        </a>
    </div>
</section>

<section id="action" class="py-5">
    <div class="container text-center">
        <h2>Take Action</h2>
        <p class="lead">Make a difference today. Sign our pledge, attend awareness events, and volunteer to support
            gender equality in your local or digital community.</p>
        <img src="" class="img-fluid mt-3" alt="pic7">
        <a href="#contact" class="btn btn-success mt-3">Become a Volunteer</a>
    </div>
</section>

<section id="contact" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Contact Us</h2>
        <form class="mt-4" action="controller/submit_contact.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                </div>
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control" rows="5"
                    placeholder="Share your inquiry, feedback, or collaboration idea. We'd love to hear from you!"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Send Message</button>
        </form>

        <div class="text-center mt-4">
            <p>Follow us on social media:</p>
            <a href="https://facebook.com" class="mr-3" aria-label="Facebook"><i class="fa-brands fa-facebook fa-lg fa-beat" style="color: #000000;"></i></a>
            <a href="https://instagram.com" class="mr-3" aria-label="Instagram"><i class="fa-brands fa-instagram fa-lg fa-beat" style="color: #000000;"></i></i></a>
            <a href="https://twitter.com" aria-label="Twitter"><i class="fa-brands fa-twitter fa-lg fa-beat" style="color: #000000;"></i></a>
        </div>
    </div>
</section>

<!-- Story Submission Modal -->
<div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="storyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="controller/submit_story.php" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storyModalLabel">Share Your Story</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name (optional)</label>
                    <input type="text" name="name" class="form-control" placeholder="Anonymous">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" min="1" max="120" required>
                </div>
                <div class="form-group">
                    <label>Your Story</label>
                    <textarea name="story" class="form-control" rows="5"
                        placeholder="Tell us your experience or thoughts..." required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit Story</button>
            </div>
        </form>
    </div>
</div>


<?php include('includes/footer.php'); ?>