## Laravel Ecommerce Project


### The goal for this is to develop a base code for ecommerce with:
* shopping cart
* account information
* order/customer tracking
* analytics
* SSL/TLS/Certificates for https
* payment processing
* drop shipping
* SEO
* openshift or other cloud hosting
* full stack documentation
* database ER diagram
* tests
* skinning of front end
* built in, best in class security


### Philosophical goals
* There's probably a bunch of these ecommerce options out there, however I want to remain with the Laravel spirit of simplicity and delight to use/extend.
* I want to keep it easy, cleanly coded, and documented enough for beginners to use happily, while leaving it extensible enough for an experienced dev to fork.
* Therefore, only what can be found in the Laravel [docs](https://laravel.com/docs) is what I'm using for the backend.

### Security Goals
1. [HTTP-within-SSL/TLS](http://security.stackexchange.com/questions/5126/whats-the-difference-between-ssl-tls-and-https)
	* Extended validation
2.  Stripe.  
	* Full Credit Card info stored on Stripes servers.
	* Only store a token in our database.
3. Tokenization of sessions.  
	* [CSRF Prevention](https://laravel.com/docs/master/routing#csrf-x-csrf-token)
4. Sanitized User inputs
	* [SQL injection prevention](https://en.wikipedia.org/wiki/SQL_injection)
	* [Cross site Scripting and other injection attacks](https://en.wikipedia.org/wiki/Cross-site_scripting)
5. Only open source, actively developed software projects used.
	* Many active users using it. 
	* Audit by proxy.
	* Security patches/updates.