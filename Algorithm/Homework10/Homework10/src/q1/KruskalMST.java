package q1;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashSet;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-04-04 15:10
 */
public class KruskalMST {
    public static void KRUSKAL(int [] V,Edge [] E){
        Arrays.sort(E);//将边按照权重w升序排序
        ArrayList<HashSet> sets=new ArrayList<HashSet>();
        for(int i=0;i<V.length;i++){
            HashSet set=new HashSet();
            set.add(V[i]);
            sets.add(set);
        }

        System.out.println("All tree size is: "+sets.size());
        for(int i=0;i<E.length;i++){
            int start=E[i].i,end=E[i].j;
            int counti=-1,countj=-2;
            for(int j=0;j<sets.size();j++){
                HashSet set=sets.get(j);
                if(set.contains(start)){
                    counti=j;
                }

                if(set.contains(end)){
                    countj=j;
                }
            }
            if(counti<0||countj<0) System.err.println("Can't find point in the tree，error");

            if(counti!=countj){
                System.out.println("start="+start+"||end="+end+"||w="+E[i].w);
                HashSet setj=sets.get(countj);
                sets.remove(countj);
                HashSet seti=sets.get(counti);
                sets.remove(counti);
                seti.addAll(setj);
                sets.add(seti);
            }else{
                System.out.println("They are in the same tree，cannot build: start="+start+"||end="+end+"||w="+E[i].w);

            }
        }


    }

    public static void main(String [] args){

        int [] V={1,2,3,4,5,6};
        Edge[] E=new Edge[10];
        E[0]=new Edge(1,2,53);
        E[1]=new Edge(1,6,55);
        E[2]=new Edge(2,3,47);
        E[3]=new Edge(2,6,70);
        E[4]=new Edge(3,4,45);
        E[5]=new Edge(3,5,21);
        E[6]=new Edge(3,6,68);
        E[7]=new Edge(4,5,56);
        E[8]=new Edge(4,6,32);
        E[9]=new Edge(5,6,37);
        KruskalMST.KRUSKAL(V, E);
    }

}