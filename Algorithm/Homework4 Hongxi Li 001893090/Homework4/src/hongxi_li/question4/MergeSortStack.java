package hongxi_li.question4;

import java.util.Stack;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/7/19 9:16 PM
 */
public class MergeSortStack {

    //homework4_4

    public static void main(String[] args) {
        int array[]={38, 10, 43, 3, 9, 82, 27};
        Stack< Integer> stack=new Stack<Integer>();
        int i=0;
        while(i<array.length)
        {
            stack.push(array[i++]);

        }
        Sort(stack);
        while(!stack.isEmpty())
        {
            System.out.println(stack.pop());
        }
    }


    public static void Sort(Stack< Integer> stack)
    {
        if(!stack.isEmpty())
        {
            int temp=stack.pop();
            Sort(stack);
            InsertSort(stack,temp);
        }
    }
    public static void InsertSort(Stack<Integer> stack, int Elem)
    {
        if(stack.isEmpty()||Elem>stack.peek())
        {
            stack.push(Elem);
        }
        else {
            int temp=stack.pop();
            InsertSort(stack, Elem);
            stack.push(temp);
        }

    }
}

