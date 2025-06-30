        // Mobile Sidebar Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('mobileSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const openBtn = document.getElementById('openSidebarBtn');
            const closeBtn = document.getElementById('closeSidebarBtn');

            // Open sidebar
            openBtn.addEventListener('click', function() {
                sidebar.classList.add('show');
                overlay.classList.add('show');
                document.body.style.overflow = 'hidden';
            });

            // Close sidebar
            closeBtn.addEventListener('click', function() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            });

            // Close sidebar when clicking on overlay
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            });

            // Close sidebar when a link is clicked (optional)
            const sidebarLinks = sidebar.querySelectorAll('a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (!this.hasAttribute('data-bs-toggle')) {
                        sidebar.classList.remove('show');
                        overlay.classList.remove('show');
                        document.body.style.overflow = '';
                    }
                });
            });

            // Initialize Bootstrap modal
            const categoriesModal = new bootstrap.Modal(document.getElementById('categoriesModal'));

            // Function to toggle categories modal (if needed)
            window.toggleCategoriesModal = function() {
                categoriesModal.show();
            };
        });
