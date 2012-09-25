# WP-Migration
I love Ruby on Rail's `rake db:migrate` and want to have a similar one when I develop a WordPress based website.

## Possible usage(hypothetical)
    $ wp-cli plugin install wp-migration
    ....
    $ wp-cli migration generate AddContactPage
    created: migrations/20120926122829_add_contact_page.php
    $ vim migrations/20120926122829_add_contact_page.php
    <?php
    class AddContactPage extends WPMigration_Migration {
      function up() {
        activate_plugin('contact-form-7/wp-contact-form-7.php');
        $args = array(
          'title' => 'Contact',
        );

        $contact_form = wpcf7_get_contact_form_default_pack($args);
        $contact_form->form = $cf7_form_template;
        $contact_form->save();
      }

      function down() {
        $pages = get_pages(array('post_type' => 'wpcf7_contact_form'));
        foreach ($pages as $page) {
          wp_delete_post($page->ID, true);
        }
        deactivate_plugin('contact-form-7/wp-contact-form-7.php');
      }
    }
    ?>
    :wq
    $ wp-cli migration migrate
    ....
    $ wp-cli migration rollback
    ....


