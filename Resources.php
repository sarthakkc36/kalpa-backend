<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once 'includes/config.php';
$page_title = "Educational Resources";
$current_page = "resources";
include 'includes/header.php';
$additional_styles='    <style>
        .resource-categories {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .category-section {
            margin-bottom: 4rem;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .category-title {
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--secondary);
            font-size: 1.8rem;
        }

        .category-title i {
            color: var(--primary);
            font-size: 2rem;
        }

        .resources-list {
            display: grid;
            gap: 1.5rem;
        }

        .resource-item {
            background: var(--background);
            border-radius: 12px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
            transition: all 0.3s ease;
        }

        .resource-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .resource-details {
            flex: 1;
        }

        .resource-details h4 {
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .resource-meta {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            color: #666;
            font-size: 0.9rem;
        }

        .resource-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .download-button {
            padding: 0.8rem 1.5rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 120px;
            justify-content: center;
        }

        .download-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .download-button i {
            font-size: 1.1rem;
        }

        /* Premium Resources Section */
        .premium-resources {
            background: var(--background);
            padding: 4rem 0;
            margin: 4rem 0;
        }

        .premium-banner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .premium-content h3 {
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .premium-features {
            list-style: none;
            margin: 2rem 0;
        }

        .premium-features li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.1rem;
        }

        .premium-features i {
            color: var(--primary);
        }

        .premium-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .premium-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .premium-banner {
                grid-template-columns: 1fr;
                padding: 2rem;
                text-align: center;
            }

            .premium-features {
                display: inline-block;
                text-align: left;
            }

            .resource-item {
                flex-direction: column;
                text-align: center;
            }

            .resource-meta {
                justify-content: center;
            }
        }
    </style>';
// Get products from database
$products_query = "SELECT * FROM products WHERE is_active = 1 ORDER BY display_order ASC";
$products_result = mysqli_query($conn, $products_query);
$products = [];

if ($products_result) {
    while ($row = mysqli_fetch_assoc($products_result)) {
        $products[] = $row;
    }
}

// Get downloadable resources if you have any
$resources_query = "SELECT * FROM resources WHERE is_active = 1 ORDER BY category ASC, display_order ASC";
$resources_result = mysqli_query($conn, $resources_query);
$resources = [];
$categories = [];

if ($resources_result) {
    while ($row = mysqli_fetch_assoc($resources_result)) {
        $resources[] = $row;
        if (!in_array($row['category'], $categories)) {
            $categories[] = $row['category'];
        }
    }
}
?>
</head>
<body>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Educational Resources</h1>
            <p>Access our comprehensive collection of teaching materials and learning resources</p>
        </div>
    </section>

    <!-- Resource Categories -->

<!-- Product Grid Section -->
<section class="product-grid-section">
    <div class="container">
        <h2 class="section-title">Our Products</h2>
        <div class="product-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <a href="<?php echo htmlspecialchars($product['product_url']); ?>" target="_blank" class="product-link">
                            <div class="product-image">
                                <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-hover">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p class="product-subtitle"><?php echo htmlspecialchars($product['description']); ?></p>
                                <div class="product-price">
                                    <span class="price"><?php echo htmlspecialchars($product['price_display']); ?></span>
                                </div>
                                <div class="product-location">
                                    <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($product['location']); ?>
                                </div>
                            </div>
                        </a>
                        <button class="add-to-cart" data-url="<?php echo htmlspecialchars($product['product_url']); ?>">
                            <i class="fas fa-shopping-cart"></i> Buy Now
                        </button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">
                    <p>No products available at the moment. Please check back later.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php if (!empty($resources)): ?>
    <!-- Resource Categories -->
    <section class="resource-categories">
        <?php foreach ($categories as $category): ?>
            <div class="category-section">
                <h2 class="category-title">
                    <?php 
                    $icon = 'fa-file-alt'; // Default icon
                    
                    // Set appropriate icon based on category name
                    if (stripos($category, 'worksheet') !== false) {
                        $icon = 'fa-file-alt';
                    } elseif (stripos($category, 'guide') !== false) {
                        $icon = 'fa-book';
                    } elseif (stripos($category, 'template') !== false) {
                        $icon = 'fa-file-contract';
                    } elseif (stripos($category, 'video') !== false) {
                        $icon = 'fa-video';
                    } elseif (stripos($category, 'audio') !== false) {
                        $icon = 'fa-headphones';
                    }
                    ?>
                    <i class="fas <?php echo $icon; ?>"></i>
                    <?php echo htmlspecialchars(ucfirst($category)); ?>
                </h2>
                
                <div class="resources-list">
                    <?php 
                    $category_resources = array_filter($resources, function($resource) use ($category) {
                        return $resource['category'] === $category;
                    });
                    
                    foreach ($category_resources as $resource): 
                    ?>
                        <div class="resource-item">
                            <div class="resource-details">
                                <h4><?php echo htmlspecialchars($resource['title']); ?></h4>
                                <p><?php echo htmlspecialchars($resource['description']); ?></p>
                                <div class="resource-meta">
                                    <span><i class="fas fa-file"></i> <?php echo htmlspecialchars($resource['file_type']); ?></span>
                                    <span><i class="fas fa-download"></i> <?php echo $resource['download_count']; ?> downloads</span>
                                </div>
                            </div>
                            <a href="download.php?id=<?php echo $resource['id']; ?>" class="download-button">
                                <i class="fas fa-download"></i> Download
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php endif; ?>

<style>
.product-grid-section {
    padding: 2rem 0;
    background-color: #f5f5f5;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.section-title {
    text-align: center;
    margin-bottom: 2rem;
    color: #333;
    font-size: 1.8rem;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 1.5rem;
    padding: 1rem 0;
}

.product-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transform: translateY(-5px);
}

.product-link {
    text-decoration: none;
    color: inherit;
    flex: 1;
}

.product-image {
    position: relative;
    padding-top: 100%;
    overflow: hidden;
}

.product-image img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-image img:hover {
    transform: scale(1.05);
}

.product-info {
    padding: 1rem;
}

.product-title {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-subtitle {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 0.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-price {
    margin: 0.5rem 0;
}

.price {
    color: #f57224;
    font-size: 1.2rem;
    font-weight: 700;
}

.product-location {
    font-size: 0.8rem;
    color: #666;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.add-to-cart {
    width: 100%;
    padding: 0.8rem;
    background: #48825d;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: background-color 0.3s ease;
}

.add-to-cart:hover {
    background: #d65b15;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .product-grid {
        grid-template-columns: 1fr;
    }
}
.add-to-cart {
    width: 100%;
    padding: 0.8rem;
    background: #48825d;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.add-to-cart:hover {
    background: #254c33;
    transform: translateY(-2px);
}

.add-to-cart:active {
    transform: translateY(0);
}
</style>


<!-- Footer -->
<script>
// Add event listeners to all Buy Now buttons
document.addEventListener('DOMContentLoaded', function() {
    const buyButtons = document.querySelectorAll('.add-to-cart');
    
    buyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const url = this.getAttribute('data-url');
            if (url) {
                window.open(url, '_blank');
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
<script defer src="script.js?v=1.0"></script>
<script defer src="optimization.js?v=1.0"></script>
<script>// Add event listeners to all Buy Now buttons
    document.addEventListener('DOMContentLoaded', function() {
        const buyButtons = document.querySelectorAll('.add-to-cart');
        
        buyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                if (url) {
                    window.open(url, '_blank');
                }
            });
        });
    });</script>
</body>
</html>