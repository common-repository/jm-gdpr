=== GDPR4EVERYONE ===
Contributors: jakubmudra123
Tags: gdpr, security, cookies
Requires at least: 4.6
Tested up to: 4.9.6
Stable tag: 4.9.6
Requires PHP: 7.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

GDPR4Everyone allow you to easily inform users that your sites using cookies and get their consent with privacy policy.

== Description ==

SECURITY WARNING: THIS PLUGIN ALONE DOES NOT MAKE YOUR SITE GDPR COMPLIANT. EACH SITE USES DIFFERENT COOKIES AND EACH SITE IS DIFFERENT. YOU MAY NEED TO DO RESEARCH ABOUT WHAT COOKIES AND WHAT KIND OF PERSONAL DATA YOU ARE USING.

This plugin allow you to easily manage cookie consent message and privacy policy consents. In future version, you will create your cookies list, one of required ( google analytics , login) and second with non-required ( tracking adds etc..)

There is 3 language mutations. Czech, english and germany. It using website language, so if your site is in German, you will get germany titles. If its in Czech, you will get czech titles and if its in english, you will get english titles, of course.

Plugin allow you to enter custom cookie consent message. Since this, this message is not translated in plugin global, so you will need to translate it by our own in administration -> GDPR Plugin -> Cookie message. Default is in czech language.

This plugin provides shortcode [GDPRDeleteUserForm] to render form for deleting user by his email and password. After submit, user is deleted and all data of user stored is deleted.


== Installation ==


1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the GDPR Plugin screen to configure the plugin
4. Defautly, you have activated showing of cookie message and checkbox of privacy policy consent.


== Frequently Asked Questions ==

= Is that plugin multilanguage? =

Yes. Plugin is available in Czech, English and Germany. All translates all stored in /lang/ folder in plugin root. In future, there can be more translations of this plugin or you can create your own with poedit.

= Does this plugin block all cookies =

No, it doesn’t. This plugin only show message, that the website is using cookies for analytics. In future version, maybe it will available in plugin settings.

== Screenshots ==

1. Showing admin screen.

== Changelog ==

= 0.1 =
* A First version

== Features ==

Features:
*   Cookie message with custom text, link label or ok button label.
*   Privacy policy checkbox in registration form
*   Custom shortcode for user account deleting from frontend

== What about future? ==
*   Cookies list - allows you to filter required and non-required cookies. Non-required cookies will be blocked if user disagree with cookies.
*   User data output - allows user to create pdf with his data.