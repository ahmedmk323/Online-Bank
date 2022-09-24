<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Bank Project</td></tr>
<tr><td> <em>Student: </em> Ahmed Mohamed(amm256)</td></tr>
<tr><td> <em>Generated: </em> 4/25/2022 12:43:04 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-2-bank-project/grade/amm256" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone2 branch </li>
<li>Create a new markdown file called milestone2.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone2.md link (from Milestone2) into the proposal.md file under each milestone2 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone2.md</li>
<li>Add/commit/push the changes to Milestone2</li>
<li>PR Milestone2 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 3</li>
<li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on github and everywhere else.
Images are only accepted from dev or prod, not local host.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Create Accounts table and setup </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot from the db of the system user (Users table)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/164362481-acb783ab-0546-4493-93e5-4a46d941492f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot from the db of the world account (Accounts table)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165018382-c5dc4054-8e3c-464c-a736-2325d0bc05b7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Accounts table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain the purpose and usage of these two entries and how they relate</td></tr>
<tr><td> <em>Response:</em> <p>The accounts table has a foreign key (Accounts.id) that references to the primary<br>key (Users.id) in the users table. The purpose is that  associating the<br>user to an ID which we can use to create multiple accounts.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/47">https://github.com/ahmedmk323/IT202-002/pull/47</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Dashboard </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the requested links/navigation</td></tr>
<tr><td> <em>Response:</em> <p><img src="https://user-images.githubusercontent.com/77761414/165018445-fda63507-5e4c-4406-8bd2-5b5fa21a682e.png" alt="image"><br><img src="https://user-images.githubusercontent.com/77761414/164363686-0835018e-1ab9-460c-9efe-bc8ebab843b8.png" alt="image"><br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain which ones are working for this milestone</td></tr>
<tr><td> <em>Response:</em> <p>The only ones working so far is the profile link and the create<br>Account link.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/47">https://github.com/ahmedmk323/IT202-002/pull/47</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Create a checking Account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the Create Account Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/164363947-4f233582-557b-44a7-b0f1-7bdb2b4499e9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Create Account page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing validation errors and success message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/164364103-1a9d703e-cd33-4190-b2d0-f97164c713ef.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Account created successfully<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot showing the transaction generated from the initial deposit (from the DB)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://user-images.githubusercontent.com/77761414/165018863-61dc8d70-91f9-4c5d-b6c3-e4b5936f6221.png">https://user-images.githubusercontent.com/77761414/165018863-61dc8d70-91f9-4c5d-b6c3-e4b5936f6221.png</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain which account number generation you used and the account creation process including the transaction logic</td></tr>
<tr><td> <em>Response:</em> <p>I retrieved the id of the last inserted column and I had a<br>string that I shuffled through and extracted from 12 characters. I left padded<br>those 12 characters to that extracted id.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/49">https://github.com/ahmedmk323/IT202-002/pull/49</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com//Project/create_account.php">https://amm256-prod.herokuapp.com//Project/create_account.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> User will be able to list their accounts </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the user's account list view (show 5 accounts)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165019281-2edbbf2a-fc2b-426f-8ac6-dc8177c311b8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>List accounts page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the page is displayed and the data lookup occurs</td></tr>
<tr><td> <em>Response:</em> <p>When you click on the accounts tab in the navigation bar, it will<br>open up a page that contains a table displays the accounts associated with<br>a user.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/52">https://github.com/ahmedmk323/IT202-002/pull/52</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com/Project/accounts.php">https://amm256-prod.herokuapp.com/Project/accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Account Transaction Details </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of an account's transaction history (should have at least a few samples) Show account number/type, balance, opened date and transaction details</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165019312-29c35254-c17d-44f4-aa6d-e4b3edde6bc5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transaction page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the lookup and display occurs</td></tr>
<tr><td> <em>Response:</em> <p>This page contains a table that displays all the transactions of all the<br>accounts associated with the user. Each row displays an transaction operation from a<br>source account to a destination account. Additionally, the type of the transaction that<br>occurred , the change in the balance, expected total after the operation, and<br>if any memos left. This page is made available through &quot;click view transaction&quot;<br>button in account page. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/52">https://github.com/ahmedmk323/IT202-002/pull/52</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com/Project/transactions.php">https://amm256-prod.herokuapp.com/Project/transactions.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Deposit/Withdraw </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a Screenshot of the Deposit Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165013860-62c6bbee-41de-4eb9-9dcb-d721c4fc8503.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Deposit page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a Screenshot of the Withdraw Page (this potentially can be the same page with different views)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165013960-048ee483-ee5d-44cb-b859-c03f9e068d1f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Withdraw page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show validation error for negative numbers</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165014131-88371c99-76d2-4cb7-8d24-980879cb4579.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Deposit negative value (Made through HTML required property)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Show validation error for withdrawing more than the account contains</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165014232-305afe57-84fe-4f41-a133-6a0e8f54bdd4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Withdraw more than the remaining balance<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Show a success message for deposit and withdraw (2 screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165014531-2cc56b47-ed19-4df7-99df-07732426b4bb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Withdraw success message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165014401-2121283a-d12f-4dff-afcc-a84e64d6e9e9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Deposit success message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165020309-4089e71a-f9b6-49db-a80f-e4e568dde23e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transaction for deposit and withdraw (Table)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Show a screenshot of the transaction pairs in the DB for the above tests (should have accurate expected_total values)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165020075-bba553ab-ad4e-4a40-b10d-cc141300dbb3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transaction for deposit and withdraw (DB)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain how transactions work</td></tr>
<tr><td> <em>Response:</em> <p>A user can perform a transaction operation whether deposit or withdraw. Either one<br>of them, the operation can be done through a form designated for each<br>that can be accessed from the dashboard. After the user performs withdraw or<br>deposit, the transaction will be recorded in the transaction table, which can be<br>accessed from the <strong>Accounts page</strong>.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/53">https://github.com/ahmedmk323/IT202-002/pull/53</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com/Project/withdraw.php">https://amm256-prod.herokuapp.com/Project/withdraw.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com/Project/deposit.php">https://amm256-prod.herokuapp.com/Project/deposit.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165022113-c6fb5c88-a521-42de-953f-efe1d0786276.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Updated proposal.md<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/165021604-d340bab4-507c-4170-9809-fa5783875cc8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project board<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-2-bank-project/grade/amm256" target="_blank">Grading</a></td></tr></table>