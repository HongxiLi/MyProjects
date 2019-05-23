package q3;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-26 01:10
 */
public class MST
{
    // Number of vertices in the graph
    private static final int V=7;

    // A utility function to find the vertex with minimum key
    // value, from the set of vertices not yet included in MST
    int minKey(int key[], Boolean mstSet[])
    {
        // Initialize min value
        int min = Integer.MAX_VALUE, min_index=-1;

        for (int v = 0; v < V; v++)
            if (mstSet[v] == false && key[v] < min)
            {
                min = key[v];
                min_index = v;
            }

        return min_index;
    }

    void printMST(int parent[], int n, int graph[][])
    {
        System.out.println("Edge \tWeight");
        for (int i = 1; i < V; i++)
            System.out.println(parent[i]+" - "+ i+"\t"+
                    graph[i][parent[i]]);
    }

    void primMST(int graph[][])
    {
        int parent[] = new int[V];

        int key[] = new int [V];

        Boolean mstSet[] = new Boolean[V];

        for (int i = 0; i < V; i++)
        {
            key[i] = Integer.MAX_VALUE;
            mstSet[i] = false;
        }


        key[0] = 0;

        parent[0] = -1; 

        for (int count = 0; count < V-1; count++)
        {
            int u = minKey(key, mstSet);

            mstSet[u] = true;

            for (int v = 0; v < V; v++)

                if (graph[u][v]!=0 && mstSet[v] == false &&
                        graph[u][v] < key[v])
                {
                    parent[v] = u;
                    key[v] = graph[u][v];
                }
        }

        // print the constructed MST
        printMST(parent, V, graph);
    }

    public static void main (String[] args)
    {
        MST t = new MST();
        int graph[][] = new int[][] {
                {0, 5, 3, 0, 0, 0, 0},
                {5, 0, 4, 6, 2, 0, 0},
                {3, 4, 0, 5, 0, 11,0},
                {0, 6, 5, 0, 7, 9, 0},
                {0, 2, 0, 7, 0, 12,8},
                {0, 0, 11,9, 12,0, 7},
                {0, 0, 0, 0, 8, 7, 0}

        };

        t.primMST(graph);
    }
}
