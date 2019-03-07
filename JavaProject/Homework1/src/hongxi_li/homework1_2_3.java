package hongxi_li;

/**********************
 * @author Hongxi Li
 * @id 001893090
 ********************/

public class homework1_2_3 {
	
	//running time of N
	//查找最大数和最小数
	
	public static void main(String[] args) {
        int[] array = {12,1,2,45,30,50};
        int maxIndex = array[0];//定义最大值为该数组的第一个数
        int minIndex = array[0];//定义最小值为该数组的第一个数
        //遍历循环数组
        System.out.print("这个数组为：");
        for (int i = 0; i < array.length; i++) {
            if(maxIndex < array[i]){
                maxIndex = array[i];
            }
            if(minIndex > array[i]){
                minIndex = array[i];
            }
        }
        for (int i = 0; i < array.length; i++) {
            System.out.print(array[i]+" ");
        }
        System.out.println();
        System.out.println("这个数组的最大值为："+maxIndex+"\t最小值为："+minIndex);
    }

}
