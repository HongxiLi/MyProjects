package q7;

import java.util.LinkedList;
import java.util.Queue;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-22 23:12
 */
public class graphTraverse {

    private static String[] node; //存储节点编号
    private static int[][] arc;   //存储边
    private static boolean[] flag;//存储节点是否被访问过

    //深度优先遍历
    private void depthFirstTraversal()
    {
        flag = new boolean[node.length];
        for( int i=0;i<node.length;i++ )
        {
            if( !flag[i] )
            {
                visitByRecursive(i);
            }
        }
    }

    //深度优先遍历-递归访问节点
    private void visitByRecursive(int i)
    {
        flag[i] = true; //设置为已访问过
        System.out.print(node[i]+" ");//在控制台打印
        for( int j=0;j<node.length;j++ )
        {
            if( !flag[j] && arc[i][j]==1 )
            {
                visitByRecursive(j);//递归
            }
        }

    }

    //广度优先遍历
    private void breadthFirstTraversal ()
    {
        Queue<Integer> qu = new LinkedList<Integer>();
        /*Queue是接口，只能new一个它的实现类，
          LinkedList实现了Queue */
        flag = new boolean[node.length];
        for( int i=0;i<node.length;i++ )
        {
            if( !flag[i] )
            {
                if(qu.offer(i))//元素入队列
                {
                    flag[i] = true; //设置为已访问过
                    System.out.print(node[i]+" ");//在控制台打印
                }
                while( !qu.isEmpty() )//若队列不为空
                {
                    int temp = qu.poll();//出队列并返回值
                    for( int j=0;j<node.length;j++ )
                    {
                        if( !flag[j] && arc[temp][j]==1 )
                        {
                            if(qu.offer(j))//元素入队列
                            {
                                flag[j] = true; //设置为已访问过
                                System.out.print(node[j]+" ");//在控制台打印
                            }
                        }
                    }
                }
            }
        }

    }

    public static void main(String[] args)
    {
        // TODO Auto-generated method stub
        graphTraverse gt = new graphTraverse();
        node = new String[]{ "0", "1", "2", "3", "4", "5", "6", "7", "8"  };//节点标记
        arc = new int[][]
                {
                        //边
                        { 0, 1, 0, 1, 1, 0, 0, 0, 0 },
                        { 0, 0, 1, 0, 1, 0, 0, 0, 0 },
                        { 0, 0, 0, 0, 0, 1, 0, 0, 0 },
                        { 0, 0, 0, 0, 1, 0, 1, 0, 0 },
                        { 0, 0, 0, 0, 0, 1, 0, 1, 0 },
                        { 0, 0, 0, 0, 0, 0, 0, 0, 0 },
                        { 0, 0, 0, 0, 1, 0, 0, 1, 0 },
                        { 0, 0, 0, 0, 0, 1, 0, 0, 1 },
                        { 0, 0, 0, 0, 0, 0, 0, 0, 0 }
                };
        System.out.println("Deap First Search");
        gt.depthFirstTraversal();//调用深度优先搜索
        System.out.println("");
        System.out.println("Broad Dirst Search");
        gt.breadthFirstTraversal();//调用广度优先搜索
    }
}