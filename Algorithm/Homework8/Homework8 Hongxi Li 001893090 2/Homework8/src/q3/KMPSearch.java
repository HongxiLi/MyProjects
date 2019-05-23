package q3;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-20 17:04
 */
public class KMPSearch {
    public static int[] getNext(String pattern) {
        int[] next = new int[pattern.length()];
        int j = 0;//模式串下标
        int k = -1;//最大前后缀匹配中前缀的下一个下标（最大前后缀匹配的长度）
        int len = pattern.length();
        next[0] = -1;
        while (j < len - 1) {//j为计算当前next值的前一个下标
            //k == -1表示0～j的字符串中没有前后缀匹配
            //如果pattern.charAt(k) == pattern.charAt(j)，最大前后缀匹配长度加1
            if (k == -1 || pattern.charAt(k) == pattern.charAt(j)) {
                j++;
                k++;
                next[j] = k;
            }
            else {//此时不存在前后缀匹配。若k>1,则p[0 ～ k-1]字符串和p[j-k ～ j-1]字符串相等。
                k = next[k];//（前缀中最大前后缀匹配）的前缀的下一个下标
            }
        }
        return next;
    }
    public static int kmp(String text, String pattern) {
        int i = 0;
        int j = 0;
        int slen = text.length();
        int plen = pattern.length();
        int[] next = getNext(pattern);
        while (i < slen && j < plen) {
            if (text.charAt(i) == pattern.charAt(j)) {
                i++;
                j++;
            }
            else {
                if (next[j] == -1) {
                    i++;
                    j = 0;
                } else {
                    j = next[j];
                }
            }
            if (j == plen) {
                return i - j;
            }
        }
        return -1;
    }
    public static void main(String[] args) {
        String text = "banananobano";
        String pattern = "nano";
        System.out.println("index is :" + kmp(text, pattern));
    }
}
