package hongxi_li;

public class homework1_4 {
	
/*******************Problem 4***********************
	
	The 3-Sum Triple loop has the following running time estimate. Explain.
	Note: I do not want to prove the math. I want only the description of the math, what it 
	      represents and why the result is 1/6 N^3
	
	**************************************************/

/******************* Answer ***********************
	
    In the 3-Sum Triple loop, we defined three variables. 
    Referring to the principle of 2-sum, a[i]+ a[j] = 0, 
    we need to add the number in the i position and the number
     in each position to determine whether it is equal to 0. 
     This is a double loop. His growth is of the order of magnitude N^2. 
     In the same way, in 3-sum, we think of 2-sum as a whole. 
     Now we need to match this whole with each number to judge, 
     so there is another loop. This will take a three-layer cycle. 
     Then his instraction of running time is (N(N-1)(N-2))/3!. 
     The result of simplification is also approximately 1/6 N3, 
     since other items can be ignored relative to N^3.
	
	**************************************************/
	
	            
	
}

