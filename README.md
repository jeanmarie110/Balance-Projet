# README #

Please open the attached project in your favourite IDE. It contains a small subset of code from one of our production services classes (which we purposefully modified and simplified for this exercise). 

Imagine the following scenario:

1. You are tasked with connecting to different third party apis holding account information for users
2. You can ask a users account balance by querying their respective api 
3. There are 2 apis to connect to -> each returning a different result set (both do not require any authentication)
        a) GET https://balance.free.beeceptor.com/account-balance/{id}
        b) GET https://balance.free.beeceptor.com/getaccbal
        
        - Our user account with api a) has the id of 456
        - Our user account with api b) has the id of 556

4. Let us assume that one of you co-worker was tasked to create a small set of framework classes that provide a scafold for you to implement logic in order to:
        a) retrieve an account balance for a set account id
        b) persist it into a data store
        c) offer a manager function to call in order to trigger a balance refresh

   Your co-worker completed the task and sent you the libary as attached to this assignment to use as a framework to embed your code in.

# Tasks

1. Review the delivery (the code in the /src folder) provided by your co-worker. Try to spot and outline problems/issues you see and show how you would improve it – this can include code but also code documentation, naming, structure, content, etc. Please keep in mind that we intentionally built in defects for you to find and raise.
2. Complete the implementation by requesting the account balance from both of the provided APIs above and store it into a datastore of your choice using the framework classes provided by your co-worker.

# User Stories to implement

AS a user, I WANT TO call a cli command that fetches the current account balances from API A (accountId 456) and API B (accountId 556) and stores them into a data store
AS a user, I WANT TO call a cli command to show the current balance of my accounts in API A and API B from the data store (do not fetch from API)

# How will I be rated

Your delivery will be rated on:

- workability. does it work and implement the user stories?
- code reusability
- elegance of implementaiton
- use of libraries
- completeness of features (e.g. happy and negative path handling)
- ease of extensibility  (e.g. adding yet another api or data store backend)
- code documentaiton

# Any bonus tasks?

- You get huge bonus points for writing unit/functional tests, test coverage and ensuring overall testability of code
- providing a simple HTML interface IN ADDITION to the cli command

### How to complete the assignement ###

You need to complete both tasks and provide the final project in a zipped form, containing all files (including any files in the vendor folder) back to us. 
Make sure to provide a readme with instructions on how to through the user stories - please make sure that when following the steps to the letter we can successfully execute the commands. 
Please keep in mind that docker is used as a runtime environment - php is not installed on any of our development machines.

### How do I get set up? ###

The project contains a working Dockerfile configuration that will setup the dev system, install dependencies and run the unit tests.

### How do I run the existing tests ###

Simply run the following command to startup the container and execute the tests. You will see 2 passing tests. 

You are free to make your changes in any file and to extend the code and tool scripts as you seem fit.

Please note that during our verification we will only run this command in order to verify your tests execution - so make sure it works before submitting.

        docker run -it $(docker build -q .)