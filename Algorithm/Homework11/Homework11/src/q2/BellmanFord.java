package q2;

import java.util.*;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-04-08 23:00
 */
public class BellmanFord {
    public static void main(String[] args){

        //创建图
        //s-a, s-c, a-b, b-t, b-d, c-a, c-b, c-d, d-t
        Edge sa = new Edge("s", "A", 5);
        Edge sc = new Edge("s", "C", -2);
        Edge ab = new Edge("A", "B", 1);
        Edge bt = new Edge("B", "t", 3);
        Edge bd = new Edge("B", "D", -1);
        Edge ca = new Edge("C", "A", 2);
        Edge cb = new Edge("C", "B", 4);
        Edge cd = new Edge("C", "D", 4);
        Edge dt = new Edge("D", "t", 1);

        //从起点s出发，步骤少的排前面
        Edge[] edges = new Edge[] {sa,sc,ab,bt,bd,ca,cb,cd,dt};

        //存放到各个节点所需要消耗的时间
        Map<String,Integer> costMap = new LinkedHashMap<String,Integer>();
        //到各个节点对应的父节点
        Map<String,String> parentMap = new LinkedHashMap<String,String>();

        //初始化各个节点所消费的，当然也可以再遍历的时候判断下是否为Null
        //i=0的时候
        costMap.put("0", 0); //源点
        costMap.put("A", Integer.MAX_VALUE);
        costMap.put("B", Integer.MAX_VALUE);
        costMap.put("C", Integer.MAX_VALUE);
        costMap.put("D", Integer.MAX_VALUE);
        costMap.put("t", Integer.MAX_VALUE);

        System.out.println(costMap);


        //进行节点数n-1次循环
        for(int i =1; i< costMap.size();i++) {
            boolean hasChange = false;
            for(int j =0; j< edges.length;j++) {
                Edge edge = edges[j];
                //该边起点目前总的路径大小
                int startPointCost = costMap.get(edge.getStartPoint()) == null ? 0:costMap.get(edge.getStartPoint());
                //该边终点目前总的路径大小
                int endPointCost = costMap.get(edge.getEndPoint()) == null ? Integer.MAX_VALUE : costMap.get(edge.getEndPoint());
                //如果该边终点目前的路径大小 > 该边起点的路径大小 + 该边权重 ，说明有更短的路径了
                if(endPointCost > (startPointCost + edge.getWeight())) {
                    costMap.put(edge.getEndPoint(), startPointCost + edge.getWeight());
                    parentMap.put(edge.getEndPoint(), edge.getStartPoint());
                    hasChange = true;
                }
            }
            if (!hasChange) {
                //经常还没达到最大遍历次数便已经求出解了，此时可以优化为提前退出循环
                break;
            }
        }

        //在进行一次判断是否存在负环路
        boolean hasRing = false;
        for(int j =0; j< edges.length;j++) {
            Edge edge = edges[j];
            int startPointCost = costMap.get(edge.getStartPoint()) == null ? 0:costMap.get(edge.getStartPoint());
            int endPointCost = costMap.get(edge.getEndPoint()) == null ? Integer.MAX_VALUE : costMap.get(edge.getEndPoint());
            if(endPointCost > (startPointCost + edge.getWeight())) {
                System.out.print("\nSorry, no route!\n");
                hasRing = true;
                break;
            }
        }

        if(!hasRing) {
            //打印出到各个节点的最短路径
            for(String key : costMap.keySet()) {
                System.out.print("\nTo point "+key+" smallest distance is: "+ costMap.get(key));
                if(parentMap.containsKey(key)) {
                    List<String> pathList = new ArrayList<String>();
                    String parentKey = parentMap.get(key);
                    while (parentKey!=null) {
                        pathList.add(0, parentKey);
                        parentKey = parentMap.get(parentKey);
//
//                        System.out.println(parentKey);
                    }
                    pathList.add(key);
                    String path="";
                    for(String k:pathList) {
                        path = path.equals("") ? path : path + " --> ";
                        path = path +  k ;
                    }
                    System.out.print("，route is: "+path);
                }
            }

        }

    }

    static class Edge{
        //起点id
        private String startPoint;
        //结束点id
        private String endPoint;
        //该边的权重
        private int weight;
        public Edge(String startPoint,String endPoint,int weight) {
            this.startPoint = startPoint;
            this.endPoint = endPoint;
            this.weight = weight;
        }
        public String getStartPoint() {
            return startPoint;
        }

        public String getEndPoint() {
            return endPoint;
        }

        public int getWeight() {
            return weight;
        }
    }
}