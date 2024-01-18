
**Group Work:**

This case study offers a practical and real-world scenario for software engineering students to apply their skills, covering various aspects of software design, development, security, scalability, and maintenance. It also encourages teamwork, project management, and problem-solving.

**Activity: Developing an E-Commerce Platform for a Small Business**

**Background:**

A small local business, "Green Boutique," specializes in selling handmade and environmentally friendly products, including clothing, accessories, and home goods. Over the years, the business has gained popularity, and the owner, Jane, is looking to expand her customer base by launching an e-commerce platform. Emma envisions a user-friendly online store that will enable customers to browse, purchase, and review products. She has hired your team of software engineering students to design and develop the e-commerce platform.

**Project Scope:**

**System Design:**
Collaboratively design the architecture and database schema for the e-commerce platform.
Define user roles and permissions (admin, customer, and vendor).
Create wire-frames and prototypes for the website's user interface.

**Functionality:**
Implement user registration and authentication.
Develop product catalog and search functionality.
Enable customers to add products to a shopping cart and proceed to checkout.
Implement a payment gateway for processing orders.
Allow vendors to upload product listings and manage their inventory.
Develop a review and rating system for products.
 
**Security and Privacy:**
Ensure secure data transmission and storage.
Implement measures to protect user data and financial information.
Incorporate user privacy controls and data access restrictions.

**Scalability and Performance:**
Optimize the platform for high traffic and a growing number of products.
Conduct load testing to ensure the system can handle multiple simultaneous users.

**Testing and Quality Assurance:**
Perform rigorous testing, including unit testing, integration testing, and user acceptance testing.
Identify and rectify software defects and vulnerabilities.

**Documentation:**
Prepare user manuals and system documentation for both customers and administrators.

**Deployment and Maintenance:**
Deploy the e-commerce platform to a web server.
Set up continuous monitoring and regular maintenance procedures.
Provide training to the client's team for ongoing content management.

**Deliverables:**
Detailed system design documents, including architecture diagrams and database schemas.
User-friendly web interface with a fully functional e-commerce platform.
Comprehensive user manuals and documentation.
A deployment plan and ongoing maintenance schedule.

  
Required

Conduct an analysis of the above scenario and come with the following:
1. The skills that you will require to do this project
2. The best process model to be used in developing this project
3. The challenges you may come across when doing this project
4. The tools that you will use to do this project
5. The data gathering techniques that you will use
6. The detailed requirement specification documents list out all the requirements e.g user requirements, functional requirements, non-functional requirement, domain requirement etc.
7. The design specification e.g architectural design


----------------
# SYSTEM DESIGN

# PART 1: REQUIREMENT SPECIFICATION DOCUMENT


## 1. Introduction

This document outlines the functional and non-functional requirements for an online e-commerce website. The purpose of this website is to provide a platform for users to browse, select, and purchase products.
  
## 2. Functional Requirements

### 2.1 User Registration and Authentication

- Users should be able to register using their email address and create a secure password.
- Users should be able to log in and log out of their accounts.


### 2.2 Product Browsing

- The website should display a list of products available for purchase.
- Users should be able to search for products using keywords and filters such as price, category, and brand.

### 2.3 Shopping Cart

- Users should be able to add products to a shopping cart.
- Users should be able to view the contents of their shopping cart, including product details and total price.

### 2.4 Checkout and Payment

- Users should be able to proceed to checkout and provide shipping information.
- Users should be able to make payments using various methods such as credit card, debit card, and mobile money.


### 2.5 Order Tracking

- After making a purchase, users should be able to track the status of their order.


## 3. Non-Functional Requirements

### 3.1 Performance

- The website should load quickly and respond to user actions without delay.  

### 3.2 Security

- User data should be stored securely.
- All transactions should be encrypted to ensure the security of payment information.

### 3.3 Usability

- The website should be easy to navigate.
- The website should be accessible on various devices, including desktops, laptops, tablets, and smartphones.

### 3.4 Scalability

- The website should be able to handle a large number of users and transactions.

### 3.5 Reliability

- The website should be available 24/7, with minimal downtime.


# PART 2: DATABASE SCHEMA

The following is the database schema for our e-commerce project:


![[Entity Relationship Diagram.pdf]]


![[DB_Relationships.pdf]]


# PART 3: USER ROLES AND PERMISSIONS

Some of the users are;

1. Administrator.
2. Seller
3. Guest
4. Buyer
5. Delivery Personnel  
  

**Roles and Permissions.**

**(i) Administrator.**
The administrator in an e-commerce system plays a pivotal role in managing and overseeing the overall operation of the platform.

Their responsibilities and permissions typically include: 
1. User Management:
- Create, modify, or delete user accounts.
- Reset passwords and manage user authentication.

2. Product Management:
- Add, edit, or remove products from the platform.
- Set product categories, prices, and inventory levels.

3. Order Management:
- View and manage orders, including order processing and fulfillment.
- Handle order cancellations, returns, and refunds.

4. Content Management:
- Manage and update content on the platform, such as banners, promotions, and announcements.
- Ensure that product information is accurate and up to date.

5. Analytics and Reporting:
- Access analytics and reports on the performance of the e-commerce platform.
- Analyze user behavior, sales trends, and other key metrics to make informed decisions.

6. Security and Permissions:
- Set and manage user roles and permissions within the system.
- Implement and oversee security measures to protect against unauthorized access and potential threats.

7. System Configuration:
- Configure and customize the settings of the e-commerce platform.
- Manage payment gateway integrations, shipping options, and tax settings.

8. Technical Maintenance:
- Oversee technical aspects such as software updates, server maintenance, and database management.
- Ensure the smooth functioning of the platform and address any technical issues promptly.

9. Compliance and Policies:
- Enforce and update platform policies and guidelines.
- Ensure that the e-commerce system complies with relevant laws and regulations.

10. Communication and Support:
- Communicate with other team members, stakeholders, and external partners.
- Provide support and assistance to other users, such as customer support and sellers.

**(ii) Vendors**

1. Product Management:
- Add new products to the platform.
- Edit existing product listings, including updating product descriptions, prices, and images.
- Remove products from the platform.

2. Order Processing:
- Access and manage orders related to their products.
- Confirm and process orders, including updating order status.
- Handle order fulfillment, shipping, and tracking.

3. Inventory Management:
- Monitor and update inventory levels for their products.
- Receive notifications for low stock levels.
- Set up automated restocking if applicable.

4. Financial Transactions:
- View and manage financial transactions related to their sales.
- Access sales reports and analytics specific to their products.

5. Communication with Customers:
- Respond to customer inquiries and messages related to their products.
- Provide customer support for issues specific to their products.

6. Promotions and Discounts:
- Create and manage promotions or discounts for their products.
- Participate in platform-wide sales events or campaigns.

7. Storefront Customization:
- Customize their storefront within the platform's guidelines.
- Add branding elements, banners, and other visuals to enhance their store's appearance.

8. Analytics and Reporting:
- Access analytics and reports specific to their products and sales performance.
- Use data to make informed decisions about pricing, inventory, and product strategy.

9. Compliance:
- Adhere to platform policies and guidelines for product listings.
- Ensure that their products comply with legal and regulatory standards.

10. Technical Integration:
- Integrate their systems with the e-commerce platform for seamless order and inventory management.
- Utilize APIs and tools provided by the platform for efficient operations.

**(iii) Guests.**

Guests in an e-commerce system refer to users who visit the platform without creating an account or logging in. Their permissions are limited compared to registered users. Role of guests and their permissions in an e-commerce system include:

1. Browsing:
- Guests can browse products and services available on the platform.
- They can view product details, images, and prices.

2. Product Search:
- Guests can use the search functionality to find specific products.

3. Add to Cart:
- In many e-commerce systems, guests can add items to their shopping cart.

4. Checkout Process:
- Guests can initiate the checkout process to purchase products without creating an account.
- They typically need to provide necessary information for shipping and payment during the checkout process.

6. No Account Management:
- Guests cannot create accounts or manage account-related settings.
- They do not have the ability to save favorite products or create wish lists.

7. Communication:
- Guests may receive transactional emails related to their orders, such as order confirmation and shipping notifications.

8. Anonymous Browsing:
- Guests can browse the platform anonymously without the platform retaining their personal information after the session ends.

9. Limited Personalization:
- As guests do not have accounts, they may experience limited personalization in terms of product recommendations and tailored content.


**(iv) Buyers**

Buyers, or customers, are individuals who have registered accounts on an e-commerce platform and actively engage in purchasing products or services. Role of buyers and their permissions include:

1. Browsing and Product Search:
- Buyers can browse the entire product catalog on the platform.
- They can use search filters and sorting options to find specific products.

2. Add to Cart and Wish list:
- Buyers can add items to their shopping cart for future purchase.
- They can create wish lists and save favorite products for later.

3. Checkout and Payment:
- Buyers can initiate the checkout process to purchase products.
- They provide shipping information and choose payment methods for transactions.

4. Order History:
- Buyers have access to their order history, allowing them to track previous purchases.
- They can view order details, including itemized lists, prices, and shipping information.

5. Account Management:
- Buyers can manage their account settings, including personal information, shipping addresses, and payment methods.
- They can update passwords, email preferences, and communication settings.

6. Reviews and Ratings:
- Buyers can leave reviews and ratings for products they have purchased.
- Their feedback contributes to the overall product reputation on the platform.

7. Communication:
- Buyers may receive promotional emails, newsletters, and updates from the platform.
- They can opt in or out of certain communication preferences.

8. Returns and Refunds:
- Buyers can initiate returns and request refunds for products based on the platform's policies.

9. Personalization:
- Buyers may experience personalized recommendations based on their purchase history and browsing behavior.
- They may receive targeted promotions and discounts.

10. Saved Payment Information
- Buyers can save and manage their preferred payment methods for faster checkout.

(v) Delivery Personnel.

The role of delivery personnel in an e-commerce system is crucial for ensuring that products are successfully transported from the seller to the buyer. Some of their roles and permissions include:

1. Order Fulfillment:
- Access information about orders assigned to them for delivery.
- Receive details about the products, quantities, and delivery addresses.

2. Route Planning:
- Plan and optimize delivery routes to ensure efficient and timely deliveries.
- Utilize navigation tools or apps to find the most optimal paths.

3. Package Verification:
- Verify that the packages they receive for delivery match the order details.
- Confirm the condition of the products and report any discrepancies.

4. Communication:
- Communicate with the e-commerce platform or sellers regarding any delivery-related issues, delays, or changes.

5. Proof of Delivery:
- Collect and provide proof of delivery, such as obtaining a signature or capturing a photo at the delivery location.
- Confirm that the products were successfully delivered to the correct recipient.

6. Real-time Tracking:
- Use tracking tools or apps to update the status of the delivery in real-time.
- Provide accurate and up-to-date information on the location of the delivery.

7. Customer Interaction:
- Interact with customers at the time of delivery, providing a professional and customer-friendly experience.
- Address basic customer inquiries related to the delivery process.

8. Security Measures:
- Adhere to security protocols to ensure the safety of the products during transit.
- Follow guidelines to prevent theft or damage to packages.

9. Schedule Management:
- Manage their delivery schedule and coordinate with the platform or sellers for any adjustments or changes.

10. Return Handling:
- Handle returns, if applicable, by collecting products from customers and returning them to the designated location.


# PART 4: WIRE-FRAMES AND PROTOTYPES

1. **Home Page:**
    - Introduction to the website.
    - Featured products and promotions.
    - Newsletter section for customers to reach out to the website owner
    - Navigation links to key product categories.


![[Home Page.jpeg]]

2. **Product Details:**
    - Detailed description of a selected product that includes; product title, star rating, price, description
    - Add To Cart button that acts as a Call-To-Action for the user to purchase the product
    - Similar products section
    - Review section outlining what other customers think about selected product

![[Product Details Page.jpeg]]
3. **Search Product Page:**
    - Search bar for customers and guests alike to search for products based on product name, category or price
    - Featured categories section that displays promoted products to customers such as products on sale, or those offering discounts
    - 

![[Search Product Page.jpeg]]

4. **Shopping Cart Page:**
    - Page that displays all products that a customer has placed in their shopping cart
    - Summary section outlining total amount; shipping and taxes included.
    - A ENTER COUPON CODE button that allows users to enter coupons for discounts on their orders.

![[Shopping Cart Page.jpeg]]

5. **Shipping Details Page:**
    - This is the 2nd step towards a user placing their order
    - Page contains a Shipping-Details-Form that prompts for information to be used when delivering the product to the customer. Inputs include; firstname, lastname, address (country, city, zip/postal code), phone number and the different shipping options provided by the vendor.
    - Contains a summary section with details about the customer's order.

![[Shipping Details Page.jpeg]]



6. **Payment Options Page:**
    - Final step towards a user placing their order
    - Page contains a Payment-Options-Form that prompts for payment information.
    - Customer will be prompted their preferred payment method (credit card, paypal or M-PESA)
    - Contains a summary section with details about the customer's order. 

![[Payment Options Page.jpeg]]

# PART 5: SYSTEM PROCESSES AND UML DIAGRAMS

## 1. Customer Purchasing Process

The customer purchase process on an e-commerce website typically involves several stages, from product discovery to payment and confirmation. Here's an outline of the typical customer purchase process:

1. **Browsing and Product Discovery:**
   - **Landing on the Website:**
     - Customer arrives on the e-commerce site through a search engine, referral, or direct visit.
   - **Product Categories:**
     - Customer navigates through product categories or uses the search feature to find relevant items.

2. **Product Selection:**
   - **Product Pages:**
     - Customer clicks on a product to view detailed information.
     - Information includes product images, descriptions, specifications, pricing, and customer reviews.

3. **Adding to Cart:**
   - **Add to Cart Button:**
     - Customer decides to purchase and clicks the "Add to Cart" button.
     - The selected item is added to the shopping cart.

4. **Shopping Cart Review:**
   - **View Cart:**
     - Customer reviews the items in the shopping cart.
     - Quantity adjustments, product removal, and updates are made if necessary.

5. **Proceed to Checkout:**
   - **Checkout Button:**
     - Customer clicks the "Proceed to Checkout" button.
     - Redirected to the checkout page.

6. **Checkout Process:**
   - **Billing Information:**
     - Customer enters billing information, including name, address, and contact details.
   - **Shipping Information:**
     - Enters shipping details if different from billing.
   - **Shipping Method:**
     - Selects a preferred shipping method (standard, expedited, etc.).
   - **Payment Information:**
     - Enters payment details (credit card, PayPal, etc.).
   - **Review Order:**
     - Customer reviews the order, including products, quantities, and total cost.
     - Enters any discount codes if applicable.

7. **Place Order:**
   - **Place Order Button:**
     - Customer confirms the purchase by clicking the "Place Order" button.

8. **Payment Processing:**
   - **Payment Gateway:**
     - Payment information is securely transmitted to the payment gateway.
     - The payment gateway processes the transaction, checking for fraud and validating the payment details.

9. **Order Confirmation:**
   - **Confirmation Page:**
     - Upon successful payment, the customer sees an order confirmation page.
     - Order details, transaction ID, and estimated delivery date are provided.
   - **Confirmation Email:**
     - An email is sent to the customer's registered email address, confirming the order.

10. **Shipping and Delivery:**
    - **Fulfillment:**
      - The e-commerce site processes the order for shipping.
    - **Shipment Tracking:**
      - A tracking number is provided, allowing customers to monitor the shipment's progress.

11. **Product Receipt and Returns:**
    - **Product Arrival:**
      - Customer receives the ordered products.
    - **Return Policy:**
      - Information about the return policy is provided in case of any issues or dissatisfaction.


![[Customer Purchasing Process DFD [MConverter.eu].png]]


## 2. Return Goods Process

The customer return goods process on an e-commerce website is crucial for maintaining customer satisfaction and resolving issues with products. Here's an outline of the typical customer return process:

1. **Initiating the Return:**
	 - Customer logs into their account on the e-commerce website.
	 - Navigates to the order history or a dedicated returns section.

2. **Selecting the Order and Items:**
	 - Customer selects the specific order containing the item(s) they want to return.
	 - Indicate which item(s) from the order they wish to return.

3. **Reason for Return:**
	 - Choose a reason for the return from a predefined list (e.g., wrong size, defective, not as described).
	 - Provide additional comments or details about the reason for the return.

4. **Return Authorization:**
	- Depending on the e-commerce platform's policies, returns may be automatically approved or require manual review.
	- Automatic approval may occur for certain predefined reasons.
	- Manual Review of a returned good will be done by a Product Reviewer

5. **Shipping the Return:**
	- Customer ships the return package through a designated shipping provider or arranges for a pickup.

6. **Return Processing:**
	- The e-commerce site receives the returned items.
	- Inspection may be conducted to ensure the items are in resalable condition.
	- If items are not in resalable condition the user is prompted to choose between a refund or product exchange.
	- Defective items are then saved into the database, for later shipment back to the vendor.
     
   - **Refund or Exchange:**
     - If a refund is requested, the payment is processed based on the original payment method.
     - For exchanges, the replacement item is shipped.

7. **Communication with the Customer:**
	- The customer receives an email confirming the successful return and providing details on the refund or exchange.
	- Communicate the expected time frame for processing the return.

8. **Updating Order Status:**
	- The customer's order history is updated to reflect the return status.
	- The inventory system is updated to reflect the returned items.


![[Return goods process [MConverter.eu].png]]



--------------------

![[SECURITY AND PRIVACY]]
   




