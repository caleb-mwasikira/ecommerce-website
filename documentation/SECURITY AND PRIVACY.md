# PART 6: SECURITY AND PRIVACY

How to ensure secure data transmission and storage in an e-commerce website.

### 1. Data Minimization

Do not store confidential user information until when the information is absolutely required.
For example, the website should not store customer’s telephone numbers, addresses, locations up until the moment the customer makes an order for a product. The information at this point in time will be deemed necessary as it will be used in processing payment transactions, tracking customer orders and contacting the customer upon order delivery.

### 2. Implementation of 2 factor authentication (2FA)
The website should send 2FA codes to user’s emails and/or telephone numbers when performing critical user actions such as payment processing, account deletion and account recovery in-case of forgotten user passwords.

### 3. Use of encryption
Storage of critical confidential user information such as user passwords, customer’s credit card numbers etc, will be done in encrypted form.

- Passwords will be encrypted using the “bcrypt” symmetric encryption algorithm. 
- Customer's credit card numbers will be encrypted using the SHA256 symmetric encryption algorithm, with the key being the user's plain-text password. This will require prompting the user for their password every time the access or storage of the critical confidential information is performed.
- Regularly encrypt and backup sensitive data to safeguard against data loss or breaches.

### 4. Implementation of HTTPs and/or SSL in production
The website will run using HTTPs during production. HTTPs will ensure secure data transmission between the client and the server such that all user form requests to the server will be sent in encrypted form over the wire. If the website needs to communicate to another system running on the server, then this communication shall be encrypted using SSL.

### 5. Secure database configuration
- The production database will be configured to only be accessible via localhost. This will prevent potential intrusion from external entities via the internet.
- Creation of MySQL user accounts and privileges. The database's CREATE, READ, UPDATE, DELETE, DROP actions will be handed down to only a select MySQL user accounts via database privileges.
- Any default MySQL login credentials must be deleted before deploying the website to production.

### 6. Prevention against SQL injections
- All raw SQL queries sent to the database must run as prepared statements.
- Use of an ORM eg. Laravel's Eloquent, will reduce the need for running raw SQL queries that might be prone to SQL injections.

### 7. User Authorization
- Employ data access control measures to restrict unauthorized access to sensitive data.

### 8. User Authentication:

- Implement strong user authentication mechanisms, such as two-factor authentication, to prevent unauthorized access to user accounts.
- Enforce strong password policies, including minimum password length, complexity requirements, and regular password changes.
- Implement user account lockout mechanisms to prevent brute-force attacks and unauthorized access attempts.
- Regularly monitor user activity for suspicious patterns or anomalies that may indicate compromised accounts.


### Securing Customer and Business Payment Transactions

### 1. Choose A Reputable Payment Gateway:

-  Choose a reputable payment gateway that complies with Payment Card Industry Data Security Standard (PCI DSS) requirements.
- Examples of popular payment gateways include Stripe, PayPal, and Braintree

### 2. PCI Compliance:

 - Adhere to PCI DSS standards, which include requirements for secure network architecture, encryption, access controls, and regular security assessments.
 - If you are a store cardholder data, comply with PCI DSS requirements for storing, processing, and transmitting this information.
