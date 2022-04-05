<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Ahmed Mohamed(amm256)</td></tr>
<tr><td> <em>Generated: </em> 4/5/2022 3:25:44 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone1-deliverable/grade/amm256" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161672263-d6d3906a-6b6b-4d48-8866-374d2e46e01b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Register with error messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161672367-b096aee4-6b50-4c7e-b935-27f71acbbb2b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful registeration (test 4)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161672498-0b79c18a-25f4-4167-9719-84d2943c75ba.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Confirm of the time of creation of new account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161686227-326fe07a-feac-4bde-a767-691e1fe8343c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table with data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/13">https://github.com/ahmedmk323/IT202-002/pull/13</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The code works by letting the user to fill in a form with<br>the information needed to register new account. There are some constraints that causes<br>failure of creating new account, for example, mismatching passwords, invalid username, and invalid<br>email address. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161687279-98da9b4b-95b1-40e0-99d7-d2f51710e74f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of invalid empty email address (username) inserted<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161687468-1eef16e7-f429-44eb-9f04-5338416c60bf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of successful login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/14">https://github.com/ahmedmk323/IT202-002/pull/14</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The code works by the following the conditions:<br>The user must have a valid<br>account to login. If the user types wrong credentials (wrong username(email address), or<br>password), the form will not be submitted to the backend, otherwise, it will<br>be sent and checked if the account exists in the users table. If<br>it exists, the user will login successfully.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161688485-9c7006fd-3d04-4c69-9706-54b3ee33e408.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161688808-74078e77-ad58-44f6-b655-3e51803d9d5b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User can&#39;t access a login-protected page (home.php)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/14">https://github.com/ahmedmk323/IT202-002/pull/14</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The code works as the following:<br>If the user logs out, a message of<br>successful logout will be displayed on the screen. If the user tried to<br>access the a page in their account after they logged out, an alert<br>message will be displayed that they must be logged in to view this<br>page.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161690036-09870410-7f86-4987-8c09-7a506d915a51.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Logged out user can&#39;t access a login-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161690555-304dc377-e431-406b-ab19-5f970e7cd229.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User with editor role can&#39;t access the admin-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161690870-a8a5563f-838c-4f95-9cd0-6daa7e5b7f4a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles table with data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161690920-96c328a2-7116-405a-acfd-50e98e46e725.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>UserRoles table with data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/31">https://github.com/ahmedmk323/IT202-002/pull/31</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>For login-protected pages, the user must be logged in to access their designated<br>page. If not, two warning messages will be displayed (one for not having<br>the permission to view the page, and the second for not logged in<br>to view the page).<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>For role-protected pages, the user must have an admin role to view the<br>admin pages. If the user have other roles but admin role, so a<br>message will be displayed that they have no permissions to view the role-protected<br>page.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161692285-c389d241-c024-4341-95b0-6590f63438ce.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Register page style<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161692409-6b7eb87b-b119-48eb-9da4-369dda738382.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>List Roles page style<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/34">https://github.com/ahmedmk323/IT202-002/pull/34</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>I set one background color to all the pages. For all the navigation<br>bars, I added a color to the navigation. The links inside the navigation<br>bar has one color and when hovering over them, they change to another<br>color. Lastly, the forms have a background color that is different than the<br>webpage color, so it stands out of the page and changed the font<br>for each label with extending the width of the input box to the<br>max width of the webpage. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161688485-9c7006fd-3d04-4c69-9706-54b3ee33e408.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful logout<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161694432-5336e7f3-10da-4466-aa0e-f528e4901fea.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>An error message that email does not exist<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/16">https://github.com/ahmedmk323/IT202-002/pull/16</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>Instead of displaying an error that has technical terms, a message will be<br>displayed with few simple words (line) highlighted colors that the user will understand.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161695626-3d53fe2f-c0c8-4674-9074-6a08f18dce9c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin User&#39;s profile page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/29">https://github.com/ahmedmk323/IT202-002/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>Every user has a profile page regardless of the role assigned to them.<br>The user must be logged in to view the page, otherwise, an error<br>message will be displayed.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161696963-43fd1ea3-c32d-4fc4-bb8d-2628f16db631.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful edit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161697335-9a2ad604-e58a-4d94-8974-04f7c735cd82.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error after failing to enter correct password and mismatching new passwords<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161696799-8568d504-8962-49dc-b801-acf26d17f254.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before User edits profile<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161697077-8b08447e-e492-4ca7-aff1-e574fb45d55f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After User edits profile (username changed)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/29">https://github.com/ahmedmk323/IT202-002/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>When the user tries to edit the profile, there are constraints:</p><br><ol><br><li>For password<br>reset, the user must enter the correct current password. Also, the new password<br>and confirm password must match with a minimum length of 8.</li><br><li>For username<br>or email change, both has to be valid usernames.<br>If the user failed any<br>of the constraints, an error message will trigged, otherwise, a successful message will<br>be displayed.<br></li><br></ol><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161699008-24fcea11-bc4f-4917-a64b-0f772853c507.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Updated proposal.md<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161700679-febd77a1-aaf2-45d5-b819-c6452ad7a089.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/161700785-fdb41d1b-43fe-4d85-9dfb-11eb807839ab.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Closed Issues<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone1-deliverable/grade/amm256" target="_blank">Grading</a></td></tr></table>