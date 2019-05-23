package q4;

import java.util.Arrays;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-22 23:39
 */
public class Greedy {
    private static int greedy(int[] nums, int T){
        Arrays.sort(nums);
        int countNum = 0, sum = 0;
        for(int i:nums){
            sum += i;
            if(sum > T) break;
            countNum ++;
        }
        return countNum;
    }

    public static void main(String[] args){
        System.out.println("Count Number is: "+ greedy(new int[]{8,7,6,5,4,3,2,1,},15));
    }

}
