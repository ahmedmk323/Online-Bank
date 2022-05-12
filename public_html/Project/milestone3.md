<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Bank Project</td></tr>
<tr><td> <em>Student: </em> Ahmed Mohamed(amm256)</td></tr>
<tr><td> <em>Generated: </em> 5/12/2022 11:53:54 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-3-bank-project/grade/amm256" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone3 branch </li>
<li>Create a new markdown file called milestone3.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone3.md link (from Milestone3) into the proposal.md file under each milestone3 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone3.md</li>
<li>Add/commit/push the changes to Milestone3</li>
<li>PR Milestone3 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 4</li>
<li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to transfer between their accounts </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transfer page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168026422-e634c810-5643-4a49-958f-181b08b117c1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transfer page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing dropdown values</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168027463-698c6a6a-a017-4ce4-b78a-9638709d8bad.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Dropdown values<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing user can't transfer more funds than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168027718-e816f96a-8ad4-4f88-854b-6652841b1e50.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user can&#39;t transfer more funds than they have<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot showing user can't transfer to the same account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168027959-040dd442-9885-40ad-bdcf-223c3d73b28a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user can&#39;t transfer to the same account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot showing you can't transfer an negative balance</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168028294-926d481a-ca4f-4542-a335-28062a0b843f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User can&#39;t transfer an negative balance<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot of the generated transaction history from the db</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168029658-6fd6dbb2-51cb-4e8e-b32f-27d418524e9a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Generated transaction history from the db<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a screenshot of the Accounts table showing both affected accounts</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168030282-23f7c743-07bb-4337-a275-09b1ac1102bd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Both affected accounts <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain the code process/flow of a transfer including how the accounts are fetched for the dropdowns</td></tr>
<tr><td> <em>Response:</em> <p>User can transfer money between internal accounts (source to destination). The accounts fetched<br>for the dropdown by a query that retrieves all the accounts of the<br>logged in user, and have them both as options for the dropdowns in<br>both (source and destination).  Their might be account overlapping, like transfer money<br>to the same account. This is solved by php and js validation.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/61">https://github.com/ahmedmk323/IT202-002/pull/61</a> </td></tr>
<tr><td> <em>Sub-Task 10: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com/Project/transfers.php">https://amm256-prod.herokuapp.com/Project/transfers.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Transaction History Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transaction history page showing the new transfer transaction</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168032570-7e9b3ea3-bae1-4059-b634-22a6affdd153.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transaction History page 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168032675-0016da5f-d1f2-471a-a002-8f87f132b323.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transaction History page 2<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots demonstrating the filters and pagination</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168033427-5d327c2e-34cc-44f1-bb0b-4c20fd9d6d1b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Filters and Pagination (Selecting type of external transfer and date)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how the filters/pagination work</td></tr>
<tr><td> <em>Response:</em> <p>Filter and pagination works by dynamic queries, so you the user have the<br>option to either select on or more filter. The results from the query<br>is used  to paginate these results.  <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/64">https://github.com/ahmedmk323/IT202-002/pull/64</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com/Project/transactions.php">https://amm256-prod.herokuapp.com/Project/transactions.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's profile First name and Last name </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the user's profile with the new fields</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168108654-8a172858-b91e-4907-9633-6739085b3fa1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User&#39;s First name and Last name in profile page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/62">https://github.com/ahmedmk323/IT202-002/pull/62</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add link to profile page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com/Project/profile.php">https://amm256-prod.herokuapp.com/Project/profile.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> User will be able to transfer funds to another user </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the external transfer page with filled in data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168112023-8b23fcee-8c95-4976-be89-02b876e1da50.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>External Transfer with filled data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing user can't send more than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168112372-9f657789-335c-42d6-b5ed-e6880a32803d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Can not send more in external transfer<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing they can't send a negative amount</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168112666-19b9362b-1e85-462d-a48f-2ca7ea9eddf0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>External transfer (can not send negative amount)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot(s) showing message if a user doesn't exist and/or a destination account wasn't found</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168112869-7e9ef267-574b-4829-a001-f72255e9c845.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message when user doesn&#39;t exist or account was not found<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot of the transactions table showing the recorded transfer</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168113478-fb74283c-8dd5-46f6-9cfe-6689d141401a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Recorded transfer in transaction table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot(s) showing the updated account balances</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168113920-8b073dfc-443e-42d7-b788-1f79365f7590.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Updated account balances<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain the process of looking up the target user's account and the validation logic</td></tr>
<tr><td> <em>Response:</em> <p>User can perform external transfer to other accounts. Sender must fill out the<br>entries, same as internal transfer, but with additional fields for receiver information. The<br>sender must know the last name and last 4-digts account number beforehand. The<br>system will lookup for the receiver&#39;s id  by the last name and<br>then, using this id, the system will lookup any accounts that matches last<br>4-digts account number and the receiver&#39;s id. If the account is found, the<br>sender and receiver can check the transaction in their own transaction history page,<br>otherwise, the system will generate error that account or user is not found.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/ahmedmk323/IT202-002/pull/63">https://github.com/ahmedmk323/IT202-002/pull/63</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://amm256-prod.herokuapp.com/Project/transfers.php">https://amm256-prod.herokuapp.com/Project/transfers.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone3.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168109962-7acecb51-4872-4b49-a4e8-7c90f94eabb5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Updated Proposal.md file<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/77761414/168109503-2f39e195-ecfc-4c81-b8ed-189bdfd5e050.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Issues in Project Board <br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-3-bank-project/grade/amm256" target="_blank">Grading</a></td></tr></table>