package q4;

import java.util.LinkedList;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-29 12:16
 */
public class MaxFlow {
    static final int V = 6;

    boolean bfs(int rGraph[][], int s, int t, int parent[]) {

        boolean visited[] = new boolean[V];
        for (int i = 0; i < V; ++i)
            visited[i] = false;

        LinkedList<Integer> queue = new LinkedList<Integer>();
        queue.add(s);
        visited[s] = true;
        parent[s] = -1;

        //BFS
        while (queue.size() != 0) {
            int u = queue.poll();

            for (int v = 0; v < V; v++) {
                if (visited[v] == false && rGraph[u][v] > 0) {
                    queue.add(v);
                    parent[v] = u;
                    visited[v] = true;
                }
            }
        }

        return (visited[t] == true);
    }

    int fordFulkerson(int graph[][], int s, int t) {
        int u, v;
        int rGraph[][] = new int[V][V];

        for (u = 0; u < V; u++)
            for (v = 0; v < V; v++)
                rGraph[u][v] = graph[u][v];

        // BFS and to store path
        int parent[] = new int[V];

        int max_flow = 0;

        while (bfs(rGraph, s, t, parent)) {
            int path_flow = Integer.MAX_VALUE;
            for (v = t; v != s; v = parent[v]) {
                u = parent[v];
                path_flow = Math.min(path_flow, rGraph[u][v]);
            }
            for (v = t; v != s; v = parent[v]) {
                u = parent[v];
                rGraph[u][v] -= path_flow;
                rGraph[v][u] += path_flow;
            }
            max_flow += path_flow;
        }

        return max_flow;
    }

    public static void main(String[] args) throws java.lang.Exception {
        int graph[][] = new int[][]{
                {0, 0, 6, 0, 0, 0},
                {10,0, 2, 0, 2, 0},
                {0, 0, 0, 0, 5, 0},
                {0, 4, 0, 0, 0, 6},
                {0, 6, 4, 6, 0, 0},
                {0, 0, 0, 0, 10,0}

        };
        MaxFlow m = new MaxFlow();

        System.out.println("The maximum possible flow is " +
                m.fordFulkerson(graph, 0, 5));

    }
}
