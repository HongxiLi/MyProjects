package q1;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-04-04 14:42
 */
public class PrimMST {

    public static void PRIM(int [][] graph,int start,int n){
        int [][] mins=new int [n][2];//用于保存集合U到V-U之间的最小边和它的值，mins[i][0]值表示到该节点i边的起始节点
        //值为-1表示没有到它的起始点，mins[i][1]值表示到该边的最小值，
        //mins[i][1]=0表示该节点已将在集合U中
        for(int i=0;i<n;i++){//初始化mins

            if(i==start){
                mins[i][0]=-1;
                mins[i][1]=0;
            }else if( graph[start][i]!=-1){//说明存在（start，i）的边
                mins[i][0]=start;
                mins[i][1]= graph[start][i];
            }else{
                mins[i][0]=-1;
                mins[i][1]=Integer.MAX_VALUE;
            }
//			System.out.println("mins["+i+"][0]="+mins[i][0]+"||mins["+i+"][1]="+mins[i][1]);
        }
        for(int i=0;i<n-1;i++){
            int minV=-1,minW=Integer.MAX_VALUE;
            for(int j=0;j<n;j++){//找到mins中最小值，使用O(n^2)时间

                if(mins[j][1]!=0&&minW>mins[j][1]){
                    minW=mins[j][1];
                    minV=j;
                }
            }
//			System.out.println("minV="+minV);
            mins[minV][1]=0;
            System.out.println("Generate Minimum Spanning Tree "+i+"st edge=<"+(mins[minV][0]+1)+","+(minV+1)+">，weight="+minW);
            for(int j=0;j<n;j++){//更新mins数组
                if(mins[j][1]!=0){
//					System.out.println("MINV="+minV+"||tree[minV][j]="+tree[minV][j]);
                    if( graph[minV][j]!=-1&& graph[minV][j]<mins[j][1]){
                        mins[j][0]=minV;
                        mins[j][1]= graph[minV][j];
                    }
                }
            }
        }
    }


    public static void main(String [] args){
        int [][] tree={
                {-1, 53, -1, -1, -1, 55},
                {53, -1, 47, -1, -1, 70},
                {-1, 47, -1, 45, 21, 68},
                {-1, -1, 45, -1, 56, 32},
                {-1, -1, 21, 56, -1, 37},
                {55, 70, 68, 32, 37, -1}

        };
        PrimMST.PRIM(tree, 0, 6);
    }
}
