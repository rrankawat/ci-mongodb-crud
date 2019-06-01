To check available databases:
show dbs

Create and select database:
use mycustomers

To check in which databse are you working:
db

Create New user with rights:
db.createUser({
	user: "root",
	pwd: "12345",
	roles: [
		"readWrite", 
		"dbAdmin"
	]
});

To check all available users:
db.getUsers();

Create New collection:
db.createCollection('customers');

To see all collections:
show collections

Insert new record to collection
db.customers.insert({
	first_name: "John",
	last_name: "Doe"
});

Select all docments
db.customers.fine();

Inserting multiple records
db.customers.insert([
	{
		first_name: "Steven",
		last_name: "Smith"
	},
	{
		first_name: "Tony",
		last_name: "Stark",
		gender: "Male"
	}
]);

To display clean records:
db.customers.find().pretty();

Update a record:
db.customers.update(
	{
		first_name: "John"
	},
	{
		first_name: "John",
		last_name: "Doe",
		city: "New York"
	}
);
Another way: 'set' operator
db.customers.update(
	{
		first_name: "Steven"
	},
	{
		$set: {
			email: "steven@gmail.coms"
		}
	}
);

Removing a field:
db.customers.update(
	{
		first_name: "Steven"
	},
	{
		$unset: {
			email: 1
		}
	}
);

Add new record if not exits by upsert
db.customers.update(
	{
		first_name: "Mary"
	},
	{
		first_name: "Mary",
		last_name: "Samson"
	},
	{
		upsert: true
	}
);

db.customers.update(
	{ 
		name: "Andy" 
	},
	{
		name: "Andy",
		rating: 1,
		score: 1
	},
	{ 
		upsert: true 
	}
);

Rename a field:
db.customers.update(
	{
		first_name: "Tony"
	},
	{
		$rename: {
			"gender": "sex"
		}
	}
);

Remove a record
db.customers.remove(
	{
		name: "Andy"
	}
);

To backup database
1. Open cmd as administration
2. C:\Program Files\MongoDB\Server\4.0\bin>mongodb