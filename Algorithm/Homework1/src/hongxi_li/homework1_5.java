package hongxi_li;

/**********************
 * @author Hongxi Li
 * @id 001893090
 ********************/

public class homework1_5 {
	/*******************Problem 1***********************
	
	What are all Stack operations, explain.
	
	**************************************************/
	
	
/******************* Answer ***********************
	
insert: push() − Pushing (storing) an element on the stack.
The process of putting a new data element onto stack is known as a Push Operation.
	Step 1 − Checks if the stack is full.
	Step 2 − If the stack is full, produces an error and exit.
	Step 3 − If the stack is not full, increments top to point next empty space.
	Step 4 − Adds data element to the stack location, where top is pointing.
	Step 5 − Returns success.	
void push(int data) {
   if(!isFull()) {
      top = top + 1;   
      stack[top] = data;
   } else {
      printf("Could not insert data, Stack is full.\n");
   }
}


remove:pop() − Removing (accessing) an element from the stack.
Accessing the content while removing it from the stack, is known as a Pop Operation. 
In an array implementation of pop() operation, the data element is not actually removed, 
instead top is decremented to a lower position in the stack to point to the next value. 
But in linked-list implementation, pop() actually removes data element and deallocates memory space.
Step 1 − Checks if the stack is empty.
Step 2 − If the stack is empty, produces an error and exit.
Step 3 − If the stack is not empty, accesses the data element at which top is pointing.
Step 4 − Decreases the value of top by 1.
Step 5 − Returns success.
int pop(int data) {

   if(!isempty()) {
      data = stack[top];
      top = top - 1;   
      return data;
   } else {
      printf("Could not retrieve data, Stack is empty.\n");
   }
}
	
	
if empty: isEmpty() − check if stack is empty.
	
	
	**************************************************/


}
