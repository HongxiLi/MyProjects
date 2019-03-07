package hongxi_li;

import edu.princeton.cs.algs4.Stack;

/**********************
 * @author Hongxi Li
 * @id 001893090
 ********************/

public class ReverseStack {
	//homework1_6

	public static void main(String[] args) {
		String str = "it was the best of time";
		Stack stack = new Stack();

		String[] strArray = str.split(" ");

		for (String s : strArray) {
		stack.push(s);
		}

		StringBuilder sb = new StringBuilder();
		while (!stack.isEmpty()) {
		sb.append(stack.pop()).append(" ");
		}

		System.out.println(sb);
		}
    
}


