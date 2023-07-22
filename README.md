# SalesAchieved

The system is developed around a role based access control mechanism, where there are 6 actors, namely Sales Representative, Store Manager,Finance Manager, Digital Marketing Strategist, Courier and Admin, to whom the feature access is distributed. SalesAchievd facilitates,

Order handling with automated order details recording, order status updates and manual order additions and order payment reviewing
Product inventory management with availability checks, stock count triggers and new product additions
Handling financial figures with dynamic financial KPIs and charts generation, reports generation
Keeping records of the marketing campaigns carried out in the business page
Assigning couriers for orders, updating courier availability, recording COD payment details 
Managing system user details

The primary data input that triggers the sequence of processes in the system are the orders placed by customers. The primary flow of the system revolves around 4 main actors: the Sales Rep, Store Manager, Finance Manager and the Courier. The system automatically records the orders placed online through the Facebook business page. It was facilitated through a chatbot we integrated to the business page, where the customers are directed through a predefined sequence of steps for placing an order. The chatbot was created using the ‘Chatfuel’ messaging platform. And the order details are automatically recorded in the system database via the endpoints of Google Sheets API. The orders placed over the phone or other manual means are acquired through a form in the system. The order placement triggers the inventory level updates and other inventory related processes like keeping product inventory records, adding new products, handling product reorder level triggers and notifications. The system does not contain a payment gateway since this is solely intended for the internal staff. The payment receipts that are uploaded to the system gets reviewed by the Finance Manager and completes the order placement process, thus triggering the delivery process. Aside from that, dynamic financial KPIs and charts are generated and can be filtered monthly or yearly. A report generation module is also included in the finance dashboard. Couriers get assigned to orders and have a dedicated dashboard to handle order acceptance and payment receipt uploads. Also an admin dashboard is present for user management.
 
