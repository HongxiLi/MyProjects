package q6;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.LinkedList;
import java.util.List;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-22 18:16
 */
public class UndiGraph<Item> {
    private int vertexNum;
    private int edgeNum;
    // 邻接表
    private List<List<Integer>> adj;
    // 顶点信息
    private List<Item> vertexInfo;

    public UndiGraph(List<Item> vertexInfo) {
        this.vertexInfo = vertexInfo;
        this.vertexNum = vertexInfo.size();
        adj = new ArrayList<>();
        for (int i = 0; i < vertexNum; i++) {
            adj.add(new LinkedList<>());
        }
    }

    public UndiGraph(List<Item> vertexInfo, int[][] edges) {
        this(vertexInfo);
        for (int[] twoVertex : edges) {
            addEdge(twoVertex[0], twoVertex[1]);
        }
    }

    public int vertexNum() {
        return vertexNum;
    }

    public int edgeNum() {
        return edgeNum;
    }

    public void addEdge(int i, int j) {
        adj.get(i).add(j);
        adj.get(j).add(i);
        edgeNum++;
    }
    // 不需要set，所以不用返回List，返回可迭代对象就够了
    public Iterable<Integer> adj(int i) {
        return adj.get(i);
    }

    public Item getVertexInfo(int i) {
        return vertexInfo.get(i);
    }

    public int degree(int i) {
        return adj.get(i).size();
    }

    public int maxDegree() {
        int max = 0;
        for (int i = 0;i < vertexNum;i++) {
            if (degree(i) > max) {
                max = degree(i);
            }
        }
        return max;
    }

    public double avgDegree() {
        return 2.0 * edgeNum / vertexNum;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append(vertexNum).append(" vertexes, ").append(edgeNum).append(" edges.\n");
        for (int i = 0; i < vertexNum; i++) {
            sb.append(i).append(": ").append(adj.get(i)).append("\n");
        }
        return sb.toString();
    }

    public static void main(String[] args) {
        List<String> vertexInfo = Arrays.asList("v0", "v1", "v2", "v3", "v4", "v5", "v6",
                "v7", "v8", "v9", "v10", "v11", "v12");
        int[][] edges = {
                {0, 1}, {0, 5},
                {2, 0}, {2, 3},
                {3, 5}, {3, 2},
                {4, 2}, {4, 3},
                {5, 4},
                {6, 0}, {6, 4}, {6, 8}, {6, 9},
                {7, 6}, {7, 9},
                {8, 6},
                {9, 11}, {9, 10},
                {10, 12},
                {11, 12}, {11, 4},
                {12, 9}
        };

        UndiGraph<String> graph = new UndiGraph<>(vertexInfo, edges);

        System.out.println("Adjancey List is :\n" + graph);
    }

}
