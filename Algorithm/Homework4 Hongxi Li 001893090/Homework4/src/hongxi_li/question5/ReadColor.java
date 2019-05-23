package hongxi_li.question5;

import javax.imageio.ImageIO;
import java.awt.image.BufferedImage;
import java.io.File;
import java.util.ArrayList;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/8/19 12:12 PM
 */
public class ReadColor {


    /**
     * 读取一张图片的RGB值
     *
     * @throws Exception
     */
    public Double[] getImagePixel(String image) throws Exception {
         int[] rgb = new int[3];
        File file = new File(image);
        BufferedImage bi = null;
        try {
            bi = ImageIO.read(file);
        } catch (Exception e) {
            e.printStackTrace();
        }
        int width = bi.getWidth();
        int height = bi.getHeight();
        int minx = bi.getMinX();
        int miny = bi.getMinY();

        ArrayList<Double> brightList = new ArrayList<>();

        for (int i = minx; i < width; i++) {
            for (int j = miny; j < height; j++) {
                int pixel = bi.getRGB(i, j); // 下面三行代码将一个数字转换为RGB数字
                rgb[0] = (pixel & 0xff0000) >> 16;
                rgb[1] = (pixel & 0xff00) >> 8;
                rgb[2] = (pixel & 0xff);

                Double I = 0.2989 * rgb[0] + 0.5870 * rgb[1] + 0.1140 * rgb[2];
                brightList.add(I);



                System.out.println("i=" + i + ",j=" + j + ":(" + rgb[0] + ","
                        + rgb[1] + "," + rgb[2] + ")" + "    I=" + I);
            }
        }
        Double[] bright=brightList.toArray(new Double[brightList.size()]);

         return bright;

    }


    /**
     * @param args
     */
    public static void main(String[] args) throws Exception {
        int x = 0;
        ReadColor rc = new ReadColor();
//        x = rc.getScreenPixel(100, 345);
        System.out.println(x + " - ");
        Double[] bright= rc.getImagePixel("/Users/hongxili/Desktop/Boston.jpeg");
        rc.sort(bright,0, bright.length-1);


        System.out.println("***List After MergeSort*** ");
        for(Double d: bright){

            System.out.println(d);
        }


    }


    /*********  MergeSort  *******/
    void merge(Double arr[], int l, int m, int r)
    {
        int n1 = m - l + 1;
        int n2 = r - m;

        Double L[] = new Double [n1];
        Double R[] = new Double [n2];


        for (int i=0; i<n1; ++i)
            L[i] = arr[l + i];
        for (int j=0; j<n2; ++j)
            R[j] = arr[m + 1+ j];


        int i = 0, j = 0;

        int k = l;
        while (i < n1 && j < n2)
        {
            if (L[i] >= R[j])
            {
                arr[k] = L[i];
                i++;
            }
            else
            {
                arr[k] = R[j];
                j++;
            }
            k++;
        }

        while (i < n1)
        {
            arr[k] = L[i];
            i++;
            k++;
        }

        while (j < n2)
        {
            arr[k] = R[j];
            j++;
            k++;
        }
    }

    // Main function that sorts arr[l..r] using
    // merge()
    void sort(Double arr[], int l, int r)
    {
        if (l < r)
        {
            // Find the middle point
            int m = (l+r)/2;

            // Sort first and second halves
            sort(arr, l, m);
            sort(arr , m+1, r);

            // Merge the sorted halves
            merge(arr, l, m, r);
        }
    }


}

