<!-- Footer Section -->
<footer class="bg-dark text-white text-center py-4 mt-auto">
  <!-- Display current year dynamically with PHP -->
  <p>&copy; <?php echo date('Y'); ?> We Are Equal. All Rights Reserved.</p>
</footer>

<!-- Bootstrap 5.3.3 Bundle (includes Popper.js for tooltip/popover support) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Smooth scroll functionality for in-page anchor links using native JavaScript -->
<script>
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        // Prevent default jump-to behavior
        e.preventDefault();
        
        // Adjust scroll position to account for fixed navbar height (70px)
        const offsetTop = target.offsetTop - 70;

        // Smoothly scroll to the target section
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      }
    });
  });
</script>

<!-- Close body and html tags -->
</body>
</html>
