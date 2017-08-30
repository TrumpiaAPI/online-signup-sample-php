# Trumpia API #
Trumpia API enables users to seamlessly integrate our technologies into their application. And with high throughput rates, a free shared short code, and included web-based user interface, we offer a complete and unmatched suite of SMS messaging functionalities. This is just one of those many powerful use cases.

#### [Click here to get your free Trumpia API key!](https://api.trumpia.com) ####

[Trumpia Home Page](https://trumpia.com)

[REST API Documentation](http://api.trumpia.com/docs/rest/overview.php)

# Overview #
This PHP application example demonstrates how to implement `PUT`, `POST`, `GET` Subscription and `GET` Report using Trumpia's RESTful API. The HTML5 web page utilizes Bootstrap for the theme and design. This simplifies the page and makes it responsive.

Bootstrap can be installed multiple ways, but the code has been included into the sample code between the `<head>` tags. Feel free to make adjustments to change the look and feel. Visit [GetBootStrap](https://getbootstrap.com/docs/4.0/getting-started/introduction/) to learn more.

#### Languages: ####
1. PHP 5.6.22
2. HTML5 & Bootstrap
3. Javascript

#### REST API functions used: ####
1. PUT Subscription
2. POST Subscription
3. GET Subscription
4. GET Report

#### Information collected on web form: ####
1. First name
2. Last name
3. Mobile number

# Application Workflow #
Once the information is submitted, the data will go through certain checks. HTML5 along with Javascript is used for input data validation. Then, GET Subscription checks the information to see if the mobile number exists. 
1. GET Subscription is used to check if the mobile number exists in the system.
2. If it does exist, the application will grab the subscription_id and use POST Subscription to edit the existing subscription.
3. If it does not exist, PUT Subscription is used to create the new subscription.

The user will receive a Javascript confirmation pop-up if: 
1. The contact has been added successfully.
2. The contact failed to add.

# Understanding Status Codes #
Description of the different status code(s) can be found within the [subscription status code documentation](https://trumpia.com/api/docs/rest/status-code/subscription.php). Common status codes for failed sign ups: 
* **MPSE0501**: mobile number has texted STOP to the short code and is blocked.
*Note: The end user can text HELP to the short code to remove the block and allow short code messaging.*
* **MPSE2201**: invalid mobile number.

#### Need some help? Found a bug? Please email [apisupport@mytrum.com](mailto:apisupport@mytrum.com) with any questions! ####
