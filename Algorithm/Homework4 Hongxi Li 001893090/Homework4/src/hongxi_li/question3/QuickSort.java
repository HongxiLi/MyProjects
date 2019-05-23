package hongxi_li.question3;

import java.util.Arrays;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/7/19 5:15 PM
 */


public class QuickSort {

    //homework4_3
        public static void sort(int a[], int low, int hight) {
            int i, j, index;
            if (low > hight) {
                return;
            }
            i = low;
            j = hight;
            index = a[i]; // 用子表的第一个记录做基准
            while (i < j) { // 从表的两端交替向中间扫描
                while (i < j && a[j] >= index)
                    j--;
                if (i < j)
                    a[i++] = a[j];// 用比基准小的记录替换低位记录
                while (i < j && a[i] < index)
                    i++;
                if (i < j) // 用比基准大的记录替换高位记录
                    a[j--] = a[i];
//                System.out.println(Arrays.toString(a));
            }
            a[i] = index;// 将基准数值替换回 a[i]
//            System.out.println(Arrays.toString(a));

            sort(a, low, i - 1); // 对低子表进行递归排序
            sort(a, i + 1, hight); // 对高子表进行递归排序

        }

        public static void quickSort(int a[]) {
            sort(a, 0, a.length - 1);
        }

        public static void main(String[] args) {

            int a[] = { 14, 17, 13, 15, 19, 10, 3, 16, 9, 12 };
            quickSort(a);
            System.out.println(Arrays.toString(a));
        }
}


