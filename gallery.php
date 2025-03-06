<?php
// Set page-specific variables
$page_title = "Kalpavriksha Education Foundation - Gallery";
$current_page = "gallery";

// Add additional CSS for the gallery page that matches the site's existing style
$additional_css = '
<style>
/* Gallery Page Styles - Matching Site\'s Original Style */
.page-header {
  background: linear-gradient(135deg, var(--secondary) 0%, #92b3a5 100%);
  padding: 6rem 2rem;
  text-align: center;
  margin-bottom: 4rem;
}

.page-header h1 {
  color: var(--primary);
  font-size: 3rem;
  margin-bottom: 1rem;
}

.page-header p {
  font-size: 1.2rem;
  max-width: 600px;
  margin: 0 auto;
  color: var(--text);
}

.gallery-section {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem 4rem;
}

.section-header {
  text-align: center;
  margin-bottom: 2rem;
}

.section-header h2 {
  color: var(--primary);
  font-size: 2.5rem;
  margin-bottom: 1rem;
  position: relative;
  display: inline-block;
}

.section-header h2:after {
  content: "";
  position: absolute;
  width: 60px;
  height: 3px;
  background: var(--primary);
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
}

.section-header p {
  color: var(--text);
  max-width: 700px;
  margin: 0 auto;
}

.filter-container {
  margin-bottom: 2rem;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 1rem;
}

.filter-btn {
  background: var(--white);
  color: var(--primary);
  padding: 0.5rem 1.5rem;
  border: 2px solid var(--primary);
  border-radius: 50px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
}

.filter-btn:hover,
.filter-btn.active {
  background: var(--primary);
  color: var(--white);
  transform: translateY(-2px);
  box-shadow: 0 4px 10px rgba(72, 130, 93, 0.2);
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem;
}

.gallery-item {
  background: var(--white);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 15px var(--shadow);
  transition: all 0.3s ease;
}

.gallery-item:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.gallery-image-container {
  position: relative;
  height: 250px;
  overflow: hidden;
}

.gallery-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.gallery-item:hover .gallery-image {
  transform: scale(1.05);
}

.gallery-content {
  padding: 1.5rem;
}

.gallery-title {
  color: var(--primary);
  font-size: 1.3rem;
  margin-bottom: 0.5rem;
}

.gallery-description {
  color: var(--text);
  font-size: 0.95rem;
  margin-bottom: 1rem;
  line-height: 1.6;
}

.gallery-category {
  display: inline-block;
  background: var(--secondary);
  color: var(--primary);
  padding: 0.3rem 1rem;
  border-radius: 50px;
  font-size: 0.8rem;
  font-weight: 500;
}

.video-item .gallery-image-container::before {
  content: "\f04b";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 3rem;
  color: var(--white);
  background-color: rgba(72, 130, 93, 0.8);
  width: 80px;
  height: 80px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  opacity: 0.9;
  transition: all 0.3s ease;
}

.video-item:hover .gallery-image-container::before {
  background-color: var(--primary);
  transform: translate(-50%, -50%) scale(1.1);
}

.section-divider {
  width: 100%;
  height: 2px;
  background: linear-gradient(to right, transparent, var(--secondary), transparent);
  margin: 4rem 0;
}

/* Lightbox Styles */
.lightbox-modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
  z-index: 1000;
  overflow: auto;
}

.lightbox-content {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  padding: 2rem;
}

.lightbox-image {
  max-width: 90%;
  max-height: 90vh;
  object-fit: contain;
}

.lightbox-video {
  max-width: 90%;
  max-height: 90vh;
}

.lightbox-close {
  position: absolute;
  top: 1rem;
  right: 1rem;
  color: var(--white);
  font-size: 2rem;
  cursor: pointer;
  z-index: 1001;
  width: 40px;
  height: 40px;
  background: rgba(0, 0, 0, 0.5);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.lightbox-close:hover {
  background: rgba(72, 130, 93, 0.8);
  transform: rotate(90deg);
}

.lightbox-caption {
  position: absolute;
  bottom: 1rem;
  left: 0;
  right: 0;
  text-align: center;
  color: var(--white);
  padding: 1rem;
  background-color: rgba(0, 0, 0, 0.5);
}

.lightbox-caption h3 {
  margin-bottom: 0.5rem;
}

.lightbox-prev,
.lightbox-next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  color: var(--white);
  font-size: 2rem;
  cursor: pointer;
  z-index: 1001;
  background-color: rgba(0, 0, 0, 0.5);
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.lightbox-prev {
  left: 1rem;
}

.lightbox-next {
  right: 1rem;
}

.lightbox-prev:hover,
.lightbox-next:hover {
  background-color: rgba(72, 130, 93, 0.8);
  transform: translateY(-50%) scale(1.1);
}

.no-items-found {
  grid-column: 1 / -1;
  text-align: center;
  padding: 3rem;
  background-color: var(--white);
  border-radius: 20px;
  box-shadow: 0 4px 15px var(--shadow);
}

.no-items-found i {
  font-size: 3rem;
  color: var(--secondary);
  margin-bottom: 1rem;
}

.no-items-found h3 {
  color: var(--primary);
  margin-bottom: 0.5rem;
}

/* Animation for gallery items */
.gallery-item {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.6s forwards;
}

@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Apply animation with staggered delay */
.gallery-item:nth-child(1) { animation-delay: 0.1s; }
.gallery-item:nth-child(2) { animation-delay: 0.2s; }
.gallery-item:nth-child(3) { animation-delay: 0.3s; }
.gallery-item:nth-child(4) { animation-delay: 0.4s; }
.gallery-item:nth-child(5) { animation-delay: 0.5s; }
.gallery-item:nth-child(6) { animation-delay: 0.6s; }
.gallery-item:nth-child(7) { animation-delay: 0.7s; }
.gallery-item:nth-child(8) { animation-delay: 0.8s; }
.gallery-item:nth-child(9) { animation-delay: 0.9s; }
.gallery-item:nth-child(n+10) { animation-delay: 1s; }

/* Tab navigation for Photos/Videos sections */
.tab-container {
  margin-bottom: 3rem;
  text-align: center;
}

.tab-navigation {
  display: inline-flex;
  background: var(--white);
  border-radius: 50px;
  padding: 0.5rem;
  box-shadow: 0 4px 15px var(--shadow);
  margin-bottom: 2rem;
}

.tab-button {
  padding: 0.8rem 2rem;
  background: transparent;
  border: none;
  border-radius: 50px;
  color: var(--primary);
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}

.tab-button.active {
  background: var(--primary);
  color: var(--white);
}

.tab-content {
  display: none;
}

.tab-content.active {
  display: block;
  animation: fadeIn 0.5s forwards;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Responsive styles */
@media (max-width: 992px) {
  .gallery-grid {
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  }
}

@media (max-width: 768px) {
  .page-header {
    padding: 4rem 1rem;
  }
  
  .page-header h1 {
    font-size: 2.5rem;
  }
  
  .gallery-section {
    padding: 0 1rem 3rem;
  }
  
  .gallery-grid {
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 1.5rem;
  }
  
  .gallery-image-container {
    height: 200px;
  }
  
  .lightbox-prev,
  .lightbox-next {
    width: 40px;
    height: 40px;
    font-size: 1.5rem;
  }
  
  .section-header h2 {
    font-size: 2rem;
  }
  
  .tab-button {
    padding: 0.6rem 1.5rem;
    font-size: 0.9rem;
  }
}

@media (max-width: 480px) {
  .gallery-grid {
    grid-template-columns: 1fr;
  }
  
  .filter-container {
    flex-direction: column;
    align-items: center;
  }
  
  .filter-btn {
    width: 100%;
    text-align: center;
  }
  
  .tab-navigation {
    width: 100%;
    flex-direction: column;
    border-radius: 15px;
  }
  
  .tab-button {
    border-radius: 0;
    width: 100%;
  }
  
  .tab-button:first-child {
    border-radius: 15px 15px 0 0;
  }
  
  .tab-button:last-child {
    border-radius: 0 0 15px 15px;
  }
}
</style>';

// Include database connection
require_once 'includes/config.php';

// Get distinct categories for images
$image_categories_query = "SELECT DISTINCT category FROM gallery_items WHERE is_active = 1 AND type = 'image' AND category IS NOT NULL AND category != '' ORDER BY category";
$image_categories_result = mysqli_query($conn, $image_categories_query);
$image_categories = [];
while ($row = mysqli_fetch_assoc($image_categories_result)) {
    $image_categories[] = $row['category'];
}

// Get distinct categories for videos
$video_categories_query = "SELECT DISTINCT category FROM gallery_items WHERE is_active = 1 AND type = 'video' AND category IS NOT NULL AND category != '' ORDER BY category";
$video_categories_result = mysqli_query($conn, $video_categories_query);
$video_categories = [];
while ($row = mysqli_fetch_assoc($video_categories_result)) {
    $video_categories[] = $row['category'];
}

// Apply filter if set for images
$image_where_clause = "is_active = 1 AND type = 'image'";
if (isset($_GET['image_category']) && $_GET['image_category'] != 'all') {
    $filter_category = mysqli_real_escape_string($conn, $_GET['image_category']);
    $image_where_clause .= " AND category = '$filter_category'";
}

// Apply filter if set for videos
$video_where_clause = "is_active = 1 AND type = 'video'";
if (isset($_GET['video_category']) && $_GET['video_category'] != 'all') {
    $filter_category = mysqli_real_escape_string($conn, $_GET['video_category']);
    $video_where_clause .= " AND category = '$filter_category'";
}

// Fetch image items
$image_query = "SELECT * FROM gallery_items WHERE $image_where_clause ORDER BY display_order ASC, created_at DESC";
$image_result = mysqli_query($conn, $image_query);

// Fetch video items
$video_query = "SELECT * FROM gallery_items WHERE $video_where_clause ORDER BY display_order ASC, created_at DESC";
$video_result = mysqli_query($conn, $video_query);

// Determine active tab
$active_tab = isset($_GET['tab']) && $_GET['tab'] == 'videos' ? 'videos' : 'photos';

// Include header
include 'includes/header.php';
?>

<!-- Page Header -->
<div class="page-header">
    <h1>Our Gallery</h1>
    <p>Explore our collection of memories, events, and activities at Kalpavriksha Education Foundation.</p>
</div>

<!-- Gallery Section -->
<section class="gallery-section">
    <!-- Tab Navigation -->
    <div class="tab-container">
        <div class="tab-navigation">
            <button class="tab-button <?php echo ($active_tab == 'photos') ? 'active' : ''; ?>" data-tab="photos">
                <i class="fas fa-images"></i> Photos
            </button>
            <button class="tab-button <?php echo ($active_tab == 'videos') ? 'active' : ''; ?>" data-tab="videos">
                <i class="fas fa-video"></i> Videos
            </button>
        </div>
    </div>

    <!-- Photos Tab Content -->
    <div id="photos-content" class="tab-content <?php echo ($active_tab == 'photos') ? 'active' : ''; ?>">
        <div class="section-header">
            <h2>Photo Gallery</h2>
            <p>Capturing moments and memories from our educational journey</p>
        </div>
        
        <!-- Filter buttons for photos -->
        <div class="filter-container photo-filters">
            <button class="filter-btn <?php echo (!isset($_GET['image_category']) || $_GET['image_category'] == 'all') ? 'active' : ''; ?>" data-filter="all" data-type="photos">All Photos</button>
            <?php foreach ($image_categories as $category): ?>
                <button class="filter-btn <?php echo (isset($_GET['image_category']) && $_GET['image_category'] == $category) ? 'active' : ''; ?>" data-filter="<?php echo htmlspecialchars($category); ?>" data-type="photos">
                    <?php echo htmlspecialchars(ucfirst($category)); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Photos Gallery Grid -->
        <div class="gallery-grid photos-grid">
            <?php if (mysqli_num_rows($image_result) > 0): ?>
                <?php while ($item = mysqli_fetch_assoc($image_result)): ?>
                    <div class="gallery-item" data-category="<?php echo htmlspecialchars($item['category']); ?>" data-type="image" data-src="<?php echo htmlspecialchars($item['file_path']); ?>" data-title="<?php echo htmlspecialchars($item['title']); ?>" data-description="<?php echo htmlspecialchars($item['description']); ?>">
                        <div class="gallery-image-container">
                            <img src="<?php echo htmlspecialchars($item['file_path']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="gallery-image" loading="lazy">
                        </div>
                        <div class="gallery-content">
                            <h3 class="gallery-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p class="gallery-description"><?php echo htmlspecialchars(substr($item['description'], 0, 100)); ?><?php echo (strlen($item['description']) > 100) ? '...' : ''; ?></p>
                            <span class="gallery-category"><?php echo htmlspecialchars(ucfirst($item['category'])); ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="no-items-found">
                    <i class="fas fa-images"></i>
                    <h3>No photos found</h3>
                    <p>No photos available in this category. Please try another filter or check back later.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Videos Tab Content -->
    <div id="videos-content" class="tab-content <?php echo ($active_tab == 'videos') ? 'active' : ''; ?>">
        <div class="section-header">
            <h2>Video Gallery</h2>
            <p>Educational videos and highlights from our programs and events</p>
        </div>
        
        <!-- Filter buttons for videos -->
        <div class="filter-container video-filters">
            <button class="filter-btn <?php echo (!isset($_GET['video_category']) || $_GET['video_category'] == 'all') ? 'active' : ''; ?>" data-filter="all" data-type="videos">All Videos</button>
            <?php foreach ($video_categories as $category): ?>
                <button class="filter-btn <?php echo (isset($_GET['video_category']) && $_GET['video_category'] == $category) ? 'active' : ''; ?>" data-filter="<?php echo htmlspecialchars($category); ?>" data-type="videos">
                    <?php echo htmlspecialchars(ucfirst($category)); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Videos Gallery Grid -->
        <div class="gallery-grid videos-grid">
            <?php if (mysqli_num_rows($video_result) > 0): ?>
                <?php while ($item = mysqli_fetch_assoc($video_result)): ?>
                    <?php 
                    // Extract YouTube video ID from URL
                    $video_id = '';
                    $url = $item['video_url'];
                    
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                        $video_id = $match[1];
                    }
                    
                    $thumbnail = !empty($video_id) ? "https://img.youtube.com/vi/$video_id/maxresdefault.jpg" : "";
                    ?>
                    <div class="gallery-item video-item" data-category="<?php echo htmlspecialchars($item['category']); ?>" data-type="video" data-video-id="<?php echo $video_id; ?>" data-title="<?php echo htmlspecialchars($item['title']); ?>" data-description="<?php echo htmlspecialchars($item['description']); ?>">
                        <div class="gallery-image-container">
                            <img src="<?php echo $thumbnail; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="gallery-image" loading="lazy">
                        </div>
                        <div class="gallery-content">
                            <h3 class="gallery-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p class="gallery-description"><?php echo htmlspecialchars(substr($item['description'], 0, 100)); ?><?php echo (strlen($item['description']) > 100) ? '...' : ''; ?></p>
                            <span class="gallery-category"><?php echo htmlspecialchars(ucfirst($item['category'])); ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="no-items-found">
                    <i class="fas fa-video"></i>
                    <h3>No videos found</h3>
                    <p>No videos available in this category. Please try another filter or check back later.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div class="lightbox-modal">
    <div class="lightbox-close"><i class="fas fa-times"></i></div>
    <div class="lightbox-prev"><i class="fas fa-chevron-left"></i></div>
    <div class="lightbox-next"><i class="fas fa-chevron-right"></i></div>
    <div class="lightbox-content"></div>
    <div class="lightbox-caption"></div>
</div>

<!-- Additional JavaScript for gallery functionality -->
<?php
$additional_js = '
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Tab functionality
    const tabButtons = document.querySelectorAll(".tab-button");
    const tabContents = document.querySelectorAll(".tab-content");
    
    tabButtons.forEach(button => {
        button.addEventListener("click", function() {
            const tabName = this.getAttribute("data-tab");
            
            // Update URL with the tab parameter
            const url = new URL(window.location);
            url.searchParams.set("tab", tabName);
            window.history.pushState({}, "", url);
            
            // Update active tab button
            tabButtons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
            
            // Show relevant tab content
            tabContents.forEach(content => {
                content.classList.remove("active");
                if (content.id === tabName + "-content") {
                    content.classList.add("active");
                }
            });
        });
    });
    
    // Filter functionality for photos
    const photoFilterBtns = document.querySelectorAll(".photo-filters .filter-btn");
    const photoItems = document.querySelectorAll(".photos-grid .gallery-item");

    photoFilterBtns.forEach(btn => {
        btn.addEventListener("click", function() {
            const filter = this.getAttribute("data-filter");
            
            // Update URL with the filter parameter
            const url = new URL(window.location);
            if (filter === "all") {
                url.searchParams.delete("image_category");
            } else {
                url.searchParams.set("image_category", filter);
            }
            window.history.pushState({}, "", url);
            
            // Update active class
            photoFilterBtns.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
            
            // Filter items
            photoItems.forEach(item => {
                if (filter === "all" || item.getAttribute("data-category") === filter) {
                    item.style.display = "block";
                    // Reset animation
                    item.style.animation = "none";
                    void item.offsetWidth; // Trigger reflow
                    item.style.animation = "fadeInUp 0.6s forwards";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });
    
    // Filter functionality for videos
    const videoFilterBtns = document.querySelectorAll(".video-filters .filter-btn");
    const videoItems = document.querySelectorAll(".videos-grid .gallery-item");

    videoFilterBtns.forEach(btn => {
        btn.addEventListener("click", function() {
            const filter = this.getAttribute("data-filter");
            
            // Update URL with the filter parameter
            const url = new URL(window.location);
            if (filter === "all") {
                url.searchParams.delete("video_category");
            } else {
                url.searchParams.set("video_category", filter);
            }
            window.history.pushState({}, "", url);
            
            // Update active class
            videoFilterBtns.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
            
            // Filter items
            videoItems.forEach(item => {
                if (filter === "all" || item.getAttribute("data-category") === filter) {
                    item.style.display = "block";
                    // Reset animation
                    item.style.animation = "none";
                    void item.offsetWidth; // Trigger reflow
                    item.style.animation = "fadeInUp 0.6s forwards";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });

    // Lightbox functionality
    const lightbox = document.querySelector(".lightbox-modal");
    const lightboxContent = document.querySelector(".lightbox-content");
    const lightboxCaption = document.querySelector(".lightbox-caption");
    const lightboxClose = document.querySelector(".lightbox-close");
    const lightboxPrev = document.querySelector(".lightbox-prev");
    const lightboxNext = document.querySelector(".lightbox-next");
    let currentIndex = 0;
    let galleryArray = [];

    // Function to open lightbox
    function openLightbox(index) {
        currentIndex = index;
        const item = galleryArray[currentIndex];
        
        lightboxContent.innerHTML = "";
        
        if (item.dataset.type === "image") {
            const img = document.createElement("img");
            img.src = item.dataset.src;
            img.alt = item.dataset.title;
            img.className = "lightbox-image";
            lightboxContent.appendChild(img);
        } else if (item.dataset.type === "video") {
            const iframe = document.createElement("iframe");
            iframe.src = `https://www.youtube.com/embed/${item.dataset.videoId}?autoplay=1`;
            iframe.width = "960";
            iframe.height = "540";
            iframe.className = "lightbox-video";
            iframe.allowFullscreen = true;
            iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
            lightboxContent.appendChild(iframe);
        }
        
        lightboxCaption.innerHTML = `<h3>${item.dataset.title}</h3><p>${item.dataset.description || ""}</p>`;
        lightbox.style.display = "block";
        document.body.style.overflow = "hidden";
        
        // Show/hide navigation buttons based on gallery length
        if (galleryArray.length <= 1) {
            lightboxPrev.style.display = "none";
            lightboxNext.style.display = "none";
        } else {
            lightboxPrev.style.display = "flex";
            lightboxNext.style.display = "flex";
        }
    }

    // Function to close lightbox
    function closeLightbox() {
        lightbox.style.display = "none";
        lightboxContent.innerHTML = "";
        document.body.style.overflow = "auto";
    }

    // Function to navigate to previous item
    function prevItem() {
        currentIndex = (currentIndex - 1 + galleryArray.length) % galleryArray.length;
        openLightbox(currentIndex);
    }

    // Function to navigate to next item
    function nextItem() {
        currentIndex = (currentIndex + 1) % galleryArray.length;
        openLightbox(currentIndex);
    }

    // Initialize gallery array with visible items of current tab
    function updateGalleryArray() {
        const activeTab = document.querySelector(".tab-content.active");
        galleryArray = Array.from(activeTab.querySelectorAll(".gallery-item")).filter(item => item.style.display !== "none");
    }

    // Gallery item click event
    document.querySelectorAll(".gallery-item").forEach((item, index) => {
        item.addEventListener("click", function() {
            updateGalleryArray();
            const visibleIndex = galleryArray.indexOf(this);
            openLightbox(visibleIndex);
        });
    });

    // Lightbox navigation events
    lightboxClose.addEventListener("click", closeLightbox);
    lightboxPrev.addEventListener("click", prevItem);
    lightboxNext.addEventListener("click", nextItem);
    
    // Close lightbox on overlay click
    lightbox.addEventListener("click", function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });
    
    // Keyboard navigation
    document.addEventListener("keydown", function(e) {
        if (lightbox.style.display === "block") {
            if (e.key === "Escape") {
                closeLightbox();
            } else if (e.key === "ArrowLeft") {
                prevItem();
            } else if (e.key === "ArrowRight") {
                nextItem();
            }
        }
    });
    
    // Initialize gallery array on page load
    updateGalleryArray();
});
</script>';

// Make sure back-to-top button works properly
$additional_js .= '
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Explicitly include the scroll-to-top functionality
    const button = document.querySelector(".back-to-top");
    const progressRing = button.querySelector(".progress");
    const circumference = 2 * Math.PI * 22.5; // r = 22.5
    
    // Set initial dash array
    progressRing.style.strokeDasharray = circumference;

    // Smooth scroll function
    function smoothScrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    // Update progress ring and button visibility
    function updateScroll() {
        const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
        const scrollProgress = window.scrollY;
        const scrollPercentage = scrollProgress / scrollTotal;
        
        // Update progress ring
        const offset = circumference - (scrollPercentage * circumference);
        progressRing.style.strokeDashoffset = offset;

        // Update button visibility
        if (scrollProgress > 300) {
            button.classList.add("visible");
        } else {
            button.classList.remove("visible");
        }
    }

    // Click event
    button.addEventListener("click", smoothScrollToTop);

    // Scroll event with throttle
    let isScrolling = false;
    window.addEventListener("scroll", () => {
        if (!isScrolling) {
            window.requestAnimationFrame(() => {
                updateScroll();
                isScrolling = false;
            });
            isScrolling = true;
        }
    });

    // Touch events for mobile
    let touchStartY;
    button.addEventListener("touchstart", (e) => {
        touchStartY = e.touches[0].clientY;
        button.classList.add("active");
    });

    button.addEventListener("touchend", (e) => {
        const touchEndY = e.changedTouches[0].clientY;
        if (touchStartY > touchEndY) {
            smoothScrollToTop();
        }
        button.classList.remove("active");
    });

    // Initial update
    updateScroll();
});
</script>';

// Include footer
include 'includes/footer.php';
?>