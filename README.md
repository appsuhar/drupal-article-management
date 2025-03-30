# drupal-article-management
Drupal Article Management

# Article Management System in Drupal 10

## Setup Instructions

1. Clone the repository:
  git clone https://github.com/appsuhar/drupal-article-management.git
   cd article-management-system
   
2. Start the Docker containers:
   docker-compose up -d

3. Access Drupal at http://localhost:8080 and complete the installation.
4. Enable the custom module and theme:
   drush en article_stats
   drush theme\:enable mytheme
   drush config-set system.theme default mytheme

5. Import the configuration:
   drush cim

6. Access the site and start managing articles.
   This setup provides a comprehensive guide to building an Article Management System in Drupal 10 using Docker Compose. Adjust the steps as needed based on your specific requirements and environment.



