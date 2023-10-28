Endpoints are a fundamental concept in web development, enabling the interaction and integration of various systems, applications, and services over the internet. They define the structure of URLs and the rules for how data is exchanged, making it possible for clients to perform specific actions or retrieve information from a web server.

#### Product routes

	GET /products           -> Get all products
	GET /products/{id}      -> Get details of specific product by id
	POST /products/add      -> Add a new product to catalog
	POST /products/change/{id}     -> Update an existing product
	DELETE /products/remove/{id} -> Deletes an existing product

Note: 
- Deleting a product from catalog is only going to soft-delete the record from the products table. When models are soft deleted, they are not actually removed from the database. Instead a deleted_at attribute is set on the model indicating the date and time the model was 'deleted'. 

  This is done because the model might already have data which is being referenced by other models. For example, a deleted product might already have several orders placed on it, making the deletion of its data problematic.

#### Category routes
	GET /categories        -> Get a list of all product categories

	GET /categories/{id}/products 
						-> Get products in a specific category


#### Customer routes
	GET /customers         -> Get a list of all customers
	GET /customers/{id}    -> Get details of a specific customer by id
	GET /customers/{id}/orders 
					-> Get a list of orders for a specific customer


#### Order routes
	GET /orders             -> View all orders
	POST /orders/add            -> Place a new order
	GET /orders/{id}        -> Get details ofa specific order by id
	GET /orders/{id}/items  -> Get the items in a specific order
	POST /orders/{id}/items/add -> Add an item to an order

	POST /orders/change/{id}       -> Update an existing order
	DELETE /orders/remove/{id}     -> Delete a specific order by id

Note: 
- Once an order has been placed (such that the order has already been paid for and payment confirmed), only the delivery_status, delivered_at properties of the Model can thereafter be changed.

- Deleting an order will also require that the website refund the customer for any monetary value paid for said order

#### Shopping-Cart routes
	GET /cart       
		-> Get the current contents of a customer's shopping cart

	POST /cart/add -> Add a product to a shopping cart
	DELETE /cart/remove/{id} -> Remove a product from the shopping cart


#### Authentication routes
	GET /register   -> View signup page form
	POST /register  -> Create a new user account
	GET /login      -> View login page form
	POST /login     -> Login to exsiting user account
	POST /logout    -> Logout currently logged in user

 